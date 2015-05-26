<?php

require_once dirname(__FILE__).'/../lib/vtManageSerialCodeGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/vtManageSerialCodeGeneratorHelper.class.php';

/**
 * vtManageSerialCode actions.
 *
 * @package    Vt_Portals
 * @subpackage vtManageSerialCode
 * @author     ngoctv1
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class vtManageSerialCodeActions extends autoVtManageSerialCodeActions
{
    
    public function executeIndex(sfWebRequest $request)
        {
          // sorting
          if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort')))
          {
            $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
          }

          // pager
          if ($request->getParameter('page'))
          {
            $this->setPage($request->getParameter('page'));
          }
          else
          {
            $this->setPage(1);
          }

        // max per page
          if ($request->getParameter('max_per_page'))
          {
            $this->setMaxPerPage($request->getParameter('max_per_page'));
          }

          $this->sidebar_status = $this->configuration->getListSidebarStatus();
          $this->pager = $this->getPager();

          //Start - thongnq1 - 03/05/2013 - fix loi xoa du lieu tren trang danh sach
          if ($request->getParameter('current_page'))
          {
            $current_page = $request->getParameter('current_page');
            $this->setPage($current_page);
            $this->pager = $this->getPager();
          }
          //end thongnq1

          $this->sort = $this->getSort();
          $this->money_user = VtSerialCodeTable::getMoneyCheck();
          
    }

    public function executeFilter(sfWebRequest $request)
  {
    $this->setPage(1);

    if ($request->hasParameter('_reset'))
    {
      $this->setFilters($this->configuration->getFilterDefaults());

      $this->redirect('@vt_serial_code');
    }

    $this->filters = $this->configuration->getFilterForm($this->getFilters());
        //Chuyennv2 trim du lieu
      $filterValues = $request->getParameter($this->filters->getName());
      foreach ($filterValues as $key => $value)
      {
          if (isset($filterValues[$key]['text']))
          {
          $filterValues[$key]['text'] = trim($filterValues[$key]['text']);
          }
      }


        if ($request->hasParameter('_export')) {
            $this->filters->bind($filterValues);
            if ($this->filters->isValid())
            {
                $this->setFilters($this->filters->getValues());
                $query = $this->buildQuery();
                $alias = $query->getRootAlias();

                if (array_key_exists('created_at', $filterValues)) {
                    $text = trim($filterValues['created_at']['text']);
                    $dateArr = explode('-', $text);
                    if (count($dateArr) == 2) {
                        $date1 = trim($dateArr[0]);
                        $date1Arr = explode('/', $date1);
                        $date1Str = '';
                        if (count($date1Arr) == 3) {
                            $date1Str = $date1Arr[2] . '-' . $date1Arr[1] . '-' . $date1Arr[0] . ' 00:00:00';
                        }
                        $date2 = trim($dateArr[1]);
                        $date2Arr = explode('/', $date2);
                        $date2Str = '';
                        if (count($date2Arr) == 3) {
                            $date2Str = $date2Arr[2] . '-' . $date2Arr[1] . '-' . $date2Arr[0] . ' 23:59:59';
                        }
                        $query->andWhere('created_at BETWEEN ? AND ?', array($date1Str, $date2Str));
                    }
                }
                //
                $query->select($alias. ".*, a.charg_amount as charg_amount, d.name as daily_name, u.username as username");
                if (array_key_exists('publisher_name', $filterValues) && $filterValues['publisher_name']["text"]) {
                    $query->andWhere('lower(username) LIKE ?  OR id = ? ', array('%' . VtHelper::translateQuery($filterValues['publisher_name']['text']) . '%', $filterValues['publisher_name']['text']));
                }
                $query->orderBy('created_at desc');

                // $result = $query->fetchResults();
//                $result = $query->execute();
                $this->executeExportExcel($filterValues, $query);
            }
        }

  $this->filters->bind($filterValues);
    if ($this->filters->isValid())
    {
      $this->setFilters($this->filters->getValues());

      $this->redirect('@vt_serial_code');
    }
    $this->sidebar_status = $this->configuration->getListSidebarStatus();
    $this->pager = $this->getPager();
    $this->sort = $this->getSort();

    $this->setTemplate('index');
  }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        $values =$request->getParameter($this->form->getName());
        if ($form->isValid())
        {
            $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';
                               if($values['dai_ly_id'] == ''){
                        $date = '0000-00-00';
                    }else{
                        $date = date_format(date_create($values['birthday']), 'Y-m-d');
                    }
            for($i=0; $i< $values['amount_code']; $i++) {
                try {
                    
                    $card_number = VtHelper::generateNumber(9) . VtHelper::generateNumber(2);
                    $serial = VtHelper::generateNumber(9) . VtHelper::generateNumber(4);
                    $code = new VtSerialCode();
                    $code->setCardnumber($card_number);
                    $code->setChargId($values["charg_id"]);
                    $code->setType("VG");
                    $code->setSerial($serial);
                    $code->setIsStatus(0);
                    $code->setDaiLyId($values['dai_ly_id']);
                    $code->setEndDate($date);
                    $code->setAdminId(sfContext::getInstance()->getUser()->getGuardUser()->getId());
                    
                    $code->save();
                } catch (Doctrine_Validator_Exception $e) {

                    $errorStack = $form->getObject()->getErrorStack();

                    $message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ?  's' : null) . " with validation errors: ";
                    foreach ($errorStack as $field => $errors) {
                        $message .= "$field (" . implode(", ", $errors) . "), ";
                    }
                    $message = trim($message, ', ');

                    $this->getUser()->setFlash('error', $message);
                    return sfView::SUCCESS;
                }
            }

            $this->getUser()->setFlash('success', $notice);
            $this->redirect('@vt_serial_code_new');

        }
        else
        {
            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }

    public function executeExportExcel($filterValues, $query)
    {
//        $results = VtPublisherInfoTable::getInstance()->getListPublisherExport();
        $numResult   = count($query);
        $i18n = $this->getContext()->getI18N();

        //lay ra so dong cho 1 sheet tu file app.yml
        $maxRow=  sfConfig::get('app_excel_max_row',1000);
        //xac dinh so sheet can tao
        $numSheet=ceil($numResult/$maxRow);
        $objPHPExcel = new sfPhpExcel();
        if ($numResult > 0) {
            ini_set('max_execution_time', 3000);
            ini_set('memory_limit', '-1');
            $objPHPExcel->setActiveSheetIndex(0);
            $objPHPExcel->getActiveSheet()->mergeCells('A1:E1');
            $objPHPExcel->getActiveSheet()->setCellValue('A1', $i18n->__('Danh sách thẻ nạp'));
            $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
            $objPHPExcel->getActiveSheet()->mergeCells('A3:B3');
            $objPHPExcel->getActiveSheet()->setCellValue('A3', $i18n->__('Thông tin Developer'));
            $objPHPExcel->getActiveSheet()->mergeCells('E3:F3');
            $objPHPExcel->getActiveSheet()->setCellValue('A3', $i18n->__('Thông tin Developer'));
            $objPHPExcel->getActiveSheet()->setCellValue('A5', $i18n->__('Còn hoạt động'));
//            $count_dev = VtPublisherInfoTable::getNumberDeveloper();
//            $objPHPExcel->getActiveSheet()->setCellValue('B5', count(VtPublisherInfoTable::getActiveDeveloper()));
//            $objPHPExcel->getActiveSheet()->setCellValue('C5',VtHelper::convertToPhanTramround(count(VtPublisherInfoTable::getActiveDeveloper()), $count_dev ));
//            $objPHPExcel->getActiveSheet()->setCellValue('A6', $i18n->__('Chưa hoạt động'));
//            $objPHPExcel->getActiveSheet()->setCellValue('B6', count(VtPublisherInfoTable::getdeActivedDeveloper()));
//            $objPHPExcel->getActiveSheet()->setCellValue('C6',VtHelper::convertToPhanTramround(count(VtPublisherInfoTable::getdeActivedDeveloper()),$count_dev ));
//            $objPHPExcel->getActiveSheet()->setCellValue('A7', $i18n->__('Xóa vĩnh viễn'));
//            $objPHPExcel->getActiveSheet()->setCellValue('B7', count(VtPublisherInfoTable::getbannedDeveloper()));
//            $objPHPExcel->getActiveSheet()->setCellValue('C7',VtHelper::convertToPhanTramround(count(VtPublisherInfoTable::getbannedDeveloper()),$count_dev ));
//            $objPHPExcel->getActiveSheet()->getDefaultStyle()->getFont()->setName('Times New Roman');
            $objPHPExcel->getActiveSheet()->getDefaultStyle()->getFont()->setSize('11');
            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth('30');
            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth('20');
            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth('20');;

            $objPHPExcel->getActiveSheet()->setCellValue('A4', $i18n->__('Trạng thái'));
            $objPHPExcel->getActiveSheet()->setCellValue('B4', $i18n->__('Tổng số'));
            $objPHPExcel->getActiveSheet()->setCellValue('C4', $i18n->__('Tỷ lệ'));

            $objPHPExcel->getActiveSheet()->duplicateStyleArray(
                array('fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID),
                    'borders' => array(
                        'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                        'right' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                        'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                        'left' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                    ),
                    'font' => array('bold' => true),
                    'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT)
                ), "A4:C4"
            );


            $objPHPExcel->getActiveSheet()->setTitle('Báo cáo tổng hợp');
            //tao sheet
            $objPHPExcel->createSheet();

            for($j=0; $j<$numSheet; $j++) {
                $query1 = $query;
                if (!is_null($maxRow))
                    $query->limit($maxRow);
                if (!is_null($j*$maxRow))
                    $query->offset($j*$maxRow);
                $result = $query1->fetchArray();
                $objPHPExcel->setActiveSheetIndex($j+1);
                $objPHPExcel->getActiveSheet()->getDefaultStyle()->getFont()->setName('Times New Roman');
                $objPHPExcel->getActiveSheet()->getDefaultStyle()->getFont()->setSize('11');
                $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth('5');
                $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth('30');
                $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth('30');
                $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth('20');
                $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth('20');
                $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth('20');
                $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth('20');
                $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth('20');
                $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth('20');
                $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth('20');
                $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth('20');
                $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth('20');
                $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth('20');

                // $objPHPExcel->setActiveSheetIndex(0);
                // Noinh edit
                $objPHPExcel->getActiveSheet()->setCellValue('E1', $i18n->__('Danh sách thẻ nạp'));
                //$objPHPExcel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $objPHPExcel->getActiveSheet()->getStyle('E1')->getFont()->setBold(true);
                $objPHPExcel->getActiveSheet()->getStyle('E1')->getFont()->setSize(16);

                //$objPHPExcel->getActiveSheet()->mergeCells('A4:D4');
                $objPHPExcel->getActiveSheet()->mergeCells('A3:E3');
                $objPHPExcel->getActiveSheet()->setCellValue('A3', $i18n->__('Thời điểm xuất báo cáo: ') . date('d/m/Y h:i', time()));
                $objPHPExcel->getActiveSheet()->mergeCells('A4:D4');
                $objPHPExcel->getActiveSheet()->setCellValue('A4', $i18n->__('Tổng số: ') . count($numResult));
                $objPHPExcel->getActiveSheet()->setCellValue('A5', $i18n->__('STT'));
                $objPHPExcel->getActiveSheet()->setCellValue('B5', $i18n->__('Serial'));
                $objPHPExcel->getActiveSheet()->setCellValue('C5', $i18n->__('Cardnumber'));
                $objPHPExcel->getActiveSheet()->setCellValue('D5', $i18n->__('Người nạp'));
                $objPHPExcel->getActiveSheet()->setCellValue('E5', $i18n->__('Mệnh giá (VNĐ)'));
                $objPHPExcel->getActiveSheet()->setCellValue('F5', $i18n->__('Trạng thái'));
                $objPHPExcel->getActiveSheet()->setCellValue('G5', $i18n->__('Thời hạn'));
                $objPHPExcel->getActiveSheet()->setCellValue('H5', $i18n->__('Đại lý'));
                $objPHPExcel->getActiveSheet()->setCellValue('I5', $i18n->__('Admin tạo'));
//                $objPHPExcel->getActiveSheet()->setCellValue('M5', $i18n->__('Ngày tạo'));
                $objPHPExcel->getActiveSheet()->duplicateStyleArray(
                    array('fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID),
                        'borders' => array(
                            'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                            'right' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                            'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                            'left' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                        ),
                        'font' => array('bold' => true),
                        'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT)
                    ), "A5:I5"
                );
                foreach ($result as $key => $seria) {
//                    var_dump($seria);die;
                    $index = $key + 6;
                    $objPHPExcel->getActiveSheet()->setCellValue('A' . $index, $key + 1 + $j*$maxRow);
                    $objPHPExcel->getActiveSheet()->setCellValueExplicit('B' . $index, $seria['serial'],PHPExcel_Cell_DataType::TYPE_STRING );
                    $objPHPExcel->getActiveSheet()->setCellValueExplicit('C' . $index, $seria['cardnumber'],PHPExcel_Cell_DataType::TYPE_STRING );
                    $objPHPExcel->getActiveSheet()->setCellValue('D' . $index, $seria['user_id']);
                    $objPHPExcel->getActiveSheet()->setCellValue('E' . $index, number_format($seria['charg_amount']) );
                    $objPHPExcel->getActiveSheet()->setCellValue('F' . $index, $seria['is_status'] ==0 ?$i18n->__('Chưa dùng') : $i18n->__('Đã sử dụng'));
                    $objPHPExcel->getActiveSheet()->setCellValue('G' . $index, $seria['end_date'] );
                    $objPHPExcel->getActiveSheet()->setCellValue('H' . $index, $seria['daily_name'] );
                    $objPHPExcel->getActiveSheet()->setCellValueExplicit('I' . $index, $seria['username'],PHPExcel_Cell_DataType::TYPE_STRING );

                }
                $objPHPExcel->getActiveSheet()->setTitle('Sheet ' . ($j+1));
                //tao sheet
                $objPHPExcel->createSheet();
            }

        } else {
            $objPHPExcel->getActiveSheet()->mergeCells('A19:D19');
            $objPHPExcel->getActiveSheet()->setCellValue('A19', $i18n->__('Không có dữ liệu'));
        }

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $fileName = date('Ymd') . '_Danh sách thẻ nạp.xlsx';
        $path = sfConfig::get('sf_cache_dir') . '/' . $fileName;
        $objWriter->save($path);
        @header('Content-type: application/octetstream');
        @header("Pragma: public");
        @header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        @header('Content-Disposition: attachment; filename="' . $fileName . '"');
        ob_end_clean();
        ob_start();
        readfile($path);
        $size = ob_get_length();
        header("Content-Length: $size");
        ob_end_flush();
        unlink($path);
        die;
    }
}

<?php

/**
 * Created by JetBrains PhpStorm.
 * User: ngoctv1
 * Date: 5/6/14
 * Time: 6:08 PM
 * To change this template use File | Settings | File Templates.
 */
class pageRegisterComponents extends sfComponents
{
    public function executeFrmRegister(sfWebRequest $request)
    {
        $form = new UserFormRegister();
        $this->form = $form;
        if ($request->isMethod('post')) {
            $values = $request->getParameter($form->getName());
            $form->bind($values);
            if ($form->isValid()) {
                $objUser = new User();
                $username = $values['username'];
                $objUser->setUsername($username);
                $objUser->setIsActive(1);
                $salt = md5(rand(100000, 999999) . $username);
                $objUser->setSalt($salt);
                //Tạo Algorithm
                $algorithm = sfConfig::get('app_sf_guard_plugin_algorithm_callable', 'sha1');
                $algorithmAsStr = is_array($algorithm) ? $algorithm[0] . '::' . $algorithm[1] : $algorithm;
                $objUser->setAlgorithm($algorithmAsStr);
                //Tạo Password
                $objUser->setPassword(call_user_func_array($algorithm, array($salt . $values['password'])));
                $objUser->setRegisterDate(date('Y-m-d H:i:s'));
                $objUser->save();
                VtHelper::setAuthenticated($objUser, true);
            }
        }
    }


}

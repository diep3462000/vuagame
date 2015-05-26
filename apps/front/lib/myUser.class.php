<?php

class myUser extends sfBasicSecurityUser
{

    public function setMemberFb($member)
    {
        if ($member != false) { //de phong truy van ko ra ket qua van set du lieu
            $this->setAttribute('memberFb', $member);
        }
    }

    public function getMemberFb()
    {
        return $this->getAttribute('memberFb', null);
    }

    public function setMember($member)
    {
        if ($member != false) { //de phong truy van ko ra ket qua van set du lieu
            $this->setAttribute('member', $member);
        }
    }
    public function getMemberId()
    {
        if ($this->getMember() != null) {
            return $this->getMember()->getId();
        } else {
            //truong hop chua login
            return "";
        }
    }

    public function getUsername()
    {
        if ($this->getMember() != null) {
            return $this->getMember()->getUsername();
        } else {
            //truong hop chua login
            return "";
        }
    }
    public function getFullname()
    {
        if ($this->getMember() != null) {
            return $this->getMember()->getFullname();
        } else {
            //truong hop chua login
            return "";
        }
    }
    public function getMember()
    {
        return $this->getAttribute('member', null);
    }

    public function setIpAddress($ip)
    {
        $this->setAttribute('IpAddress', $ip);
    }

    public function getIpAddress()
    {
        return $this->getAttribute('IpAddress', null);
    }

    public function setUserAgent($userAgent)
    {
        $this->setAttribute('UserAgent', $userAgent);
    }

    public function getUserAgent()
    {
        return $this->getAttribute('UserAgent', null);
    }

    public function logout()
    {
        $this->getAttributeHolder()->clear();
        // Finally, destroy the session.
        session_destroy();
    }

    public function isLogin()
    {
        if ($this->getMember() != null) {
            return true;
        } else {
            return false;
        }
    }
}

<?php

class sigin extends controller
{
    var $usermodel;
    var $commonmodel;
    function __construct()
    {
        $this->usermodel = $this->ModelClient("usermodel");
        $this->commonmodel = $this->ModelCommon("commonmodel");
    }

    function error404()
    {
        $data = [];
        $this->ViewAdmin("error404", $data);
    }

    function sigin()
    {
        if (!isset($_SESSION["info"])) {
            $mess = "";
            $notification = [];
            if (isset($_POST["sigin"])) {
                $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
                $phoneregex = '/(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b/';
                $post = $_POST["data"];
                if (!preg_match($regex, $post["email"])) {
                    $notification['email'] = "Email không hợp lệ";
                } else if (!preg_match($phoneregex, $post["phonenumber"])) {
                    $notification['phonenumber'] = "SĐT không hợp lệ";
                } else if ($post["pass"] == $post["pass_confirm"]) {
                    $checkuser = $this->commonmodel->checkemail($post["email"]);
                    if ($checkuser < 1) {
                        $user = $this->commonmodel->sigin($post["name"], $post["email"], md5($post["pass"]), $post["phonenumber"], $post["address"]);
                        if ($user) {
                            NotifiSiginSuccess();
                        }
                    } else {
                        $mess = "<p style='color: red;'>Email này đã có người khác sử dụng</p>";
                    }
                } else {
                    $mess = "<p style='color: red;'>Xác nhận mật khẩu không khớp</p>";
                }
            }
            $data = ["mess" => $mess, "notify" => $notification];
            $this->ViewClinet("sigin", $data);
        } else header("location:" . base . "home/index");
    }
}

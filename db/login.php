<?php 

    session_start();
    require_once "./koneksi.php";

    if(isset($_POST['masuk'])) {
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $login = $konek->query("SELECT * FROM pengguna WHERE sandi = '$password' AND email = '$email'");
        $cek_login = mysqli_num_rows($login);
        if ($cek_login == 1) {
            $data = $login->fetch_assoc();
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['no_hp'] = $data['no_hp'];
            $_SESSION['alamat'] = $data['alamat'];
            $_SESSION['level'] = $data['level'];
            $_SESSION['user_id'] = $data['user_id'];
            if($_SESSION['level'] == 1) {
                if(isset($_GET['i'])) {
                    header("Location: ../detail/pesan.php?i=$_GET[i]");
                }
                else {
                    header("Location: ../index.php");
                }
            }
            else {
                header("Location: ../admin/index.php?page=dashboard");
            }
        }
        else {
            header("Location: ../login.php?err=1");
        }
    }

    

?>
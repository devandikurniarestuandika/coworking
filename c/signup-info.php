<?php
if(!defined('S')) {
	header("Location: s.php?auth=masuk");
}
?>
<!-- Form content box start -->
                <div class="form-content-box">
                    <!-- logo -->
                    <a href="javascript:void(0)" class="clearfix alpha-logo">
                        <img src="../img/logos/white-logo.png" alt="white-logo">
                    </a>
                    <!-- details -->
                    <div class="details">
                        <h3>Akun berhasil didaftarkan!</h3>
                        <h5>Mohon untuk dicatat info login dibawah ini</h5><br>
                        <!-- Form start -->
                        <form>
                            <div class="form-group">
                                <input type="email" name="email" class="input-text" value="<?php echo $_GET['email']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="Password" class="input-text" value="<?php echo $_GET['password']; ?>">
                            </div>
                            <div class="mb-0">
                                <a href="s.php?auth=masuk" class="btn-md btn-theme btn-block">Kembali ke login</a>
                            </div>
                        </form>
                        <!-- Form end -->
                    </div>
                </div>
                <!-- Form content box end -->
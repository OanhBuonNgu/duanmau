<div class="container">
    <div class="row">
        <div class="col">
            <h3 class="alert alert-success text-uppercase">Liên hệ</h3>
            <div class="container">
                <div class="row py-3">
                    <div class="col-6">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.9864428380806!2d105.7431278223567!3d21.03322845124844!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134548e37418ea7%3A0x755bd1b8cb1a777c!2zTmfDtSAxNzMgUGjGsMahbmcgQ2FuaCwgVGjhu4sgQ-G6pW0sIFh1w6JuIFBoxrDGoW5nLCBOYW0gVOG7qyBMacOqbSwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1645782946918!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                    <div class="col-6 font-size-primary">
                        <p>
                            Mọi thắc mắc hoặc góp ý, quý khách vui lòng liên hệ trực tiếp với bộ phận chăm sóc khách hàng của chúng tôi bằng cách điền đầy đủ thông tin vào form bên dưới
                        </p>
                        <form id="lien_he" method="post">

                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Họ Tên *</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tenkh" id="tenkh" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Email *</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="emailkh" id="emailkh" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Nội dung</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="noidung" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 col-form-label">
                                </div>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn primary font-size-primary">Gửi liên hệ</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#lien_he').submit(function(e) {
            e.preventDefault();
            if ($('#tenkh').val() == '') {
                alert('Vui lòng nhập họ tên');
            } else if ($('#emailkh').val() == '') {
                alert('Vui lòng nhập email');
            } else {
                $.ajax({
                    url: '../contact/index.php',
                    type: 'post',
                    data: $(this).serializeArray(),
                    success: function(data) {
                        alert('Phản hồi của bạn đã được gửi.Chúng tôi sẻ liên hệ bạn sau!');
                        $('#lien_he')[0].reset();
                    }

                })
            }

        })
    })
</script>
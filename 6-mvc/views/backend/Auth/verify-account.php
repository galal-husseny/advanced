{{title=Verify Account}}
<div class="row mt-5">
    <div class="col-8 offset-2 mt-5">
        <div class="card">
            <div class="card-body text-center">
                <?php if (session()->hasFlash('error') || session()->hasFlash('success')) {
                    include_once component_path('response-message');
                } else { ?>
                    <div class="alert alert-warning">
                        We Sent you An Email Address Please Check Your Previous Mails.
                    </div>
                <?php } ?>

            </div>
            <div class="card-footer">
                <form action="<?= url('resend-verification-link') ?>" method="post">
                    <button class="btn btn-outline-primary" id="counter" disabled> Resend  </button></span> 
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    // Set the date we're counting down to
    var countDownDate = new Date("<?= date("M d, Y H:i:s",strtotime($email_expired_at)) ?>").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"
        document.getElementById("counter").innerHTML = "h" + hours + minutes + "m " + seconds + "s ";

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("counter").innerHTML = "Resend";
            document.getElementById("counter").removeAttribute('disabled');
        }
    }, 1000);
</script>
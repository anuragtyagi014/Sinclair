<?php /* Template Name: What We tamplate */ ?>

<?php get_header(); ?>

<div class="all-page">
    <div class="bread-crumb">
        <h1 class="ttl">What We Do </h1>
    </div>

    <div class="all-cont-are">
        <h2>About Us</h2>

        <p>Businesses are under more pressure to create engagement that drives revenue. But the digital landscape is
            growing, and the competition for attention is fierce. So how do you differentiate in a sea of sameness?</p>

        <p>Captivating design influences the mind and emotions of your customers and prospects leaving a lasting
            impression that binds them to your brand, increasing loyalty and sales opportunities.</p>

        <p>SINCLAIR create unique visual brand identities, digital experiences and creative content that drives customer
            acquisition and retention. We are a passionate team of strategists, designers and developers who are
            committed to creating experiences that help you win in your industry.</p>

        <h2>Branding</h2>

        <p>Create visual brand identities that are authentic, differentiated and consistent across all of your touch
            points. Our design team communicates your company’s values and purpose and develops visual identities that
            reflect your unique DNA.</p>

        <p>We guide businesses of all maturities through brand identity processes, evaluating and expressing the
            fundamentals. Delivered through brand guidelines, we ensure that consistent standards are met from internal
            and external stakeholders.</p>

        <h1>Accordion</h1>
        <div class="accordion">
            <div class="heading">Accordion #1</div>
            <div class="contents">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua.</div>

            <div class="heading">Accordion #2</div>
            <div class="contents">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua.</div>

            <div class="heading">Accordion #3</div>
            <div class="contents">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua.</div>
        </div>

        <style>
            @import url('https://fonts.googleapis.com/css?family=Roboto');

            body {
                background: #f0f8ff;
                font-family: 'Roboto', sans-serif;
            }

            .accordion {
                max-width: 300px;
                background: linear-gradient(to bottom right, #FFF, #f7f7f7);
                background: #0097a7;
                margin: 0 auto;
                border-radius: 3px;
                box-shadow: 0 10px 15px -20px rgba(0, 0, 0, 0.3), 0 30px 45px -30px rgba(0, 0, 0, 0.3), 0 80px 55px -30px rgba(0, 0, 0, 0.1);
            }

            .heading {
                color: #FFF;
                font-size: 14px;
                border-bottom: 1px solid #e7e7e7;
                letter-spacing: 0.8px;
                padding: 15px;
                cursor: pointer;
            }

            .heading:nth-last-child(2) {
                border-bottom: 0;
            }

            .heading:hover {
                background: #00838f;
                border-radius: 0;
            }

            .heading:first-child:hover {
                border-radius: 3px 3px 0 0;
            }

            .heading:nth-last-child(2):hover {
                border-radius: 0 0 3px 3px;
            }

            .heading::before {
                content: '';
                vertical-align: middle;
                display: inline-block;
                border-top: 7px solid #f5f5f5;
                border-left: 7px solid transparent;
                border-right: 7px solid transparent;
                float: right;
                transform: rotate(0);
                transition: all 0.5s;
                margin-top: 5px;
            }

            .active.heading::before {
                transform: rotate(-180deg);
            }

            .not-active.heading::before {
                transform: rotate(0deg);
            }

            .contents {
                display: none;
                background: #FFFAFA;
                padding: 15px;
                color: #7f8fa4;
                font-size: 13px;
                line-height: 1.5;
            }

            h1 {
                font-size: 40px;
                color: #000;
                font-weight: normal;
                text-align: center;
                margin: 50px 0;
            }
        </style>


    </div>
</div>
<script>    $(document).ready(function () {
        $(".accordion").on("click", ".heading", function () {

            $(this).toggleClass("active").next().slideToggle();

            $(".contents").not($(this).next()).slideUp(300);

            $(this).siblings().removeClass("active");
        });
    });
</script>
<?php get_footer(); ?>
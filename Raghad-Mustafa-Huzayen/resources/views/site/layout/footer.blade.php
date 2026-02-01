<footer class="footer-section" style="background: #1e293b; padding: 40px 0;">
    <div class="container">
        <div class="row">

            <!-- About -->
            <div class="col-md-4">
                <h3 style="color: #ffffff;">Yalla Dodge</h3>
                <p><b>
                    Organizing fun and professional weekly dodgeball games for all skill levels.
                </b></p>
            </div>

            <!-- Links -->
            <div class="col-md-3 ml-auto">
                <h3 style="color: #ffffff;">Links</h3>
                <ul class="list-unstyled footer-links">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li><a href="{{ route('games.index') }}">Weekly Games</a></li>
                    <li><a href="{{ route('private') }}#schedule-section">Private Games</a></li>
                    <li><a href="{{ route('coaches.index') }}#trainer-section">Our Coaches</a></li>
                </ul>
            </div>

            <!-- Subscribe -->
            <div class="col-md-4">
                <h3 style="color: #ffffff;">Stay in touch</h3>
                <p>
                    <b>Follow us on <a href="https://www.instagram.com/jdf.jo/"><b>Instagram</b></a>.</b>
                </p>
                <p>
                    <b>Join our <a href="https://l.instagram.com/?u=https%3A%2F%2Fchat.whatsapp.com%2FJCHeEH9boNUEJQIDT3fXqf%3Futm_source%3Dig%26utm_medium%3Dsocial%26utm_content%3Dlink_in_bio%26fbclid%3DPAZXh0bgNhZW0CMTEAc3J0YwZhcHBfaWQMMjU2MjgxMDQwNTU4AAGnB2D20GUR3Vvkafx_9a_mrC-GEdw-6Lxz8UB1UdKalvOPqSu3X--vu5HcZ2I_aem_jx32GT1tq-2vVnA47lWOKQ&e=AT30W_v45DIQFIhds0dSNJ74Tfhkcd_CpPBwV4x66krmY8rgmtzrgOkTkiB9D8Xd5QNGRO-IlAeZne45MFvI7OAFt_ik5flUnN4Qg0R-uQ"><b>WhatsApp</b></a> community.</b>
                </p>
            </div>

        </div>

        <!-- Copyright -->
        <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
                <div class="pt-5">
                    <p class="copyright" style="color: #ffffff;">
                        <small>
                            &copy; {{ date('Y') }} Yalla Dodge. All Rights Reserved.
                            Design by
                            <a href="{{ route('admin.login') }}" target="_blank">Raghad Huzayen</a>
                        </small>
                    </p>
                </div>
            </div>
        </div>

    </div>
</footer>

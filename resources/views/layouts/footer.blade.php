<blockquote style="margin-bottom: 0; border-radius: 0;">
<br>
  <div class="row">
    <div class="col-md-6">
      <p>Berita mobil, Spesifikasi mobil, Profil mobil, Marketing mobil<br>
      dan Forum diskusi.</p>
      <li class="social">
        <a style="padding: 10px;" class="fa fa-facebook" href="https://www.facebook.com/Kampus-Mobil-247408789060534/"></a>
        <a style="padding: 10px;" class="fa fa-twitter" href="https://twitter.com/kampusmobil"></a>
        <a style="padding: 10px;" class="fa fa-google" href="https://plus.google.com/u/1/111026721153212508704"></a>
        <a style="padding: 10px;" class="fa fa-instagram" href="https://www.instagram.com/kampusmobil/"></a>
        <a style="padding: 10px;" class="fa fa-youtube" href="https://www.youtube.com/channel/UC95Bj_ZS_E0V6BdbOz09uYQ"></a>
      </li>
    </div>

    <div class="col-md-6">
      <div class="text-center">
          <li class="fotli">
            <a href="/articles">Berita</a>
          </li>
          <li class="fotli">
            <a href="/videos">Videos</a>
          </li>
          <li class="fotli">
            <a href="/forum">Forum</a>
          </li>
          <li class="fotli">
            <a href="/spesifikasi">Spesifikasi</a>
          </li>
          <li class="fotli">
            <a href="/member">Member</a>
          </li>
      </div>
      <div class="text-center">
        @if (Auth::guest())
          <li class="fotli">
            <a href="/login">Login</a>
          </li>
          <li class="fotli">
            <a href="/register">Register</a>
          </li>
        @endif
      </div>
      <div class="text-center">
        <li class="fotli">
          <a href="/kritik-dan-saran">Kritik dan saran</a>
        </li>
        <li class="fotli">
          <a href="/karir">Marketing karir</a>
        </li>
        @if(Auth::check())
          @if(Auth::user()->admin())
            <li class="fotli">
              <a href="/iklan">Iklan</a>
            </li>
          @endif
        @endif
        <li class="fotli">
          <a href="/syarat-dan-ketentuan">Syarat dan Ketentuan</a>
        </li>
      </div>
      <div class="text-center">
        <li class="fotli">
          <a style="padding: 5px;" class="fa fa-facebook" href="http://kampusmobil.com/auth/facebook"> Login with facebook</a>
        </li>
        <li class="fotli">
          <a style="padding: 5px;" class="fa fa-google" href="http://kampusmobil.com/auth/google"> Login with google</a>
        </li>
        <li class="fotli">
          <a style="padding: 5px;" class="fa fa-twitter" href="http://kampusmobil.com/auth/twitter"> Login with twitter</a>
        </li>
      </div>
    </div>
  </div>
  <p class="text-center">All rights reserved.</p>
  <h5 class="text-center"><b> &copy; kampusmobil 2017.</b></h5>
</blockquote>

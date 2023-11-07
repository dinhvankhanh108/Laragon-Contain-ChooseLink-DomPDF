<?php
require_once 'autoload.inc.php'; // Adjust the path as per your project's setup

use Dompdf\Dompdf;
use Dompdf\Options;

$root = realpath(__DIR__);
// echo sys_get_temp_dir() . "<br>";
// $root =  realpath(__DIR__) . "/lib/fonts";
// die();

$fontDir = __DIR__ . '/fonts/';
$font = 'meiryo.ttf';

$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', true);
$options->set('isJavascriptEnabled', true);
$options->set("isPhpEnabled", true);

// $options->set('isFontSubsettingEnabled', true);
$options->set('fontDir', $root . '/fonts'); // Replace with the actual font directory path
$options->set('fontCache', $root . '/fonts'); // Replace with the actual font directory path
$options->set('defaultFont', $font);
// $dompdf->set_option('fontDir', $fontDir);
// $dompdf->set_option('defaultFont', $font);
$dompdf = new Dompdf($options);
$a = "page1";
$html = <<<HTML
		<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-15">
  
  <style>
  .left {
    float: left;
    border: 1px solid green;
    width: 3em;
  }
  
  .right {
    float: right;
    border: 1px solid blue;
    width: 3em;
  }
  
  .block {
    float: left;
    border: 1px solid red;
    width: 3em;
  }
  
  img {
    outline: 1px dotted red;
  }
  </style>

</head>

<body>


<table border="1" style="border: 1px solid black; width: 500px; text-align: center;">
  <tr>
      <td>fooo</td>
      <td>
        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAABMCAIAAACnG28HAAAABmJLR0QA/wD/AP%2BgvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH1AgeBS42B7vBqgAAEhBJREFUeNrtnd%2BPHEcVhfcfBoknxAOIh0g88EsIIqKI1UprObYVe23FwQmskO0EYSskkCgkEo5MCMgoGBABhBDkIXzV3%2Byh6Onu6ZnZ2Zm1u1Qa9fb0VFfdOvfcW7du9%2B59NpWpbKDsTSKYygSsqUzAmsoErKlMZQLWVDZeHj3%2B67vvf/DSjZcODy/%2B9N5bH374O85MwJrKWpACT/vPfe%2B5Z5/97re/8cxXv/L1rz3DwcEPngdhS8FrAtZUZgWWuvHiJcBkBVugivrlL30RbB0eHLx5784ErKksUWCj6zd/DHqAEZD6wuc/x8GNo6uvvnLLPwGZZnEC1lSWsH1CSnKyiq3LV657Ust45dLFCVhTGVXACoiJOyWe8LHEmSdfu3NbK7krphBtgDzp0zR/uynSt3/xJl65AKLKVaDq4YN3WQny%2Bdrxy5cv7MNb1KXs4AaBRc/UhqX4cyrDnhCOjjhgptfHKI3IVVR569Wb1/78x0f1ZWCL88BrKbraFLAgT/CkNkzAOi2uCqqs6/AWremtp7Log8D%2B/emnrSvhLSC1LKo2AixFoD8ItQIv2GtCxvp0VTvXiHcdqbLcC6RwzJkjUTUPLI1Pi8a2Ayw6gaMXKbBqBfUTMtYsPzq%2BG08IF3sdYIFRHCmNIKjieAVC2gKwGLBeocCi6whlQsb6RkBPKLGAldUV10qMGlXHi9pEn08fWFAUfhXunr0HYRDYClw6lRpYiLQ2hQh22WVaC6OGFZisDU3N6QMLDaC7ki0uIeZ8ijisDyzE6GIo2GKFtEJT%2BOz8lnZ0rTbnpZw%2BsDDYAAvG0n%2BffKz1S4lPHl3Vu8AOruy8S1dx/7Ekm%2BvzBhjrzu2oFxXSegrtIFNo8slptebGi8DSxwJYnYu44RWAnKd3hSt8noDFgI3YylhQ7kYHsGvUgutDRbtgbkTBGfVqHe0CWDAWKiosXBsuuySiJ86IaTBM0EYVfm8Twi2kdfOaw8DZWs0bOHcFGDHZKBKONkNGnUAYxyCM84hFyawWJsAIACwhlbSWpRKkErsCVTS1ocXgqQELYSFBPiMvIEXFfkvd5og9DVwFaJgwgcUB3gxjRxRMP9gqJw8vMrsYtWUTMrkeaBp5j/PO8XjKYXYuX7lOf6iJiO4osPQhkKYsTeVPrD49dksnOWJPPGMxcGadITNnVNDDkJMj4CauAikr5cOLLM24YAy83B%2BkmsHilk4ChOPJL0FRezhgB51WWrZ6Jp/1ZacMLG9MR8ETyocmISM6ypgRKF3hJFUfa6nxOxJNhgdb9LuXWqww8abzFhAcHMBS2kGEAHPzybclntdooJeBswHOkKLkmGRyBlL672XP%2BJVb4912usHd458AbmuSF6ia8mxH6iLzSTf4oV2iemD/6Wrn/O6toJ2aOW42k2YjShMZEFlR2ZvXSip%2B42xyfgxEVPE4Afyc1pbNs14fUnT14YN3A%2B5RJubCPl1ljvkEOoh7ngw4w/lco6D6RqdyImQFIra0X5wxpZPKwch4AQ26Tk%2BSTNDZqn3n/cpbJ0Ir9eqxzQ95OWDRxYLxkxVftgXMkPFYgDsGBIFAF4JDolYvNRY2qM%2B7vp1a2AEukGPMduKTP8cAy0cP6HCBQoOqgYsLtnBAGzeLWl9cBw6iVCYg6E4IMs4HWMhqpHAYSCDVh5sxNZAKn4FsRsQ6YHVgaafqXAvgRaOCLGk9iQ4HeXDmwhminYAy9IsetKS/Ylzt%2BGUmfrgPBggcnQZoTGobfXOMdBgRj4kDF5f0xUsynG6WOQUCywi7Bitg0k%2BP255pljMWylbrNkBFnYyV9UFCskJKh0fLiCIxlr4O7I20EfRP60brrf1wBCq8vHEQrX5wfnjxwvSE8OpURj3NdRx/WgYfwEUPuk8E6gw3MrPbboxZc%2Bity1gjyYMuCSyxVQMr6Ubqlaprl2orlulX2n3oT%2BxjmH4SFcs%2BT3ysaHgsieRE/0NRAzO7N9Ka6HUiRK1bJ%2Bu4qVlvaTEA/hy4vaE/fbUAK7lc8lbfnA0YOL9i8kLdzGIf%2Bem0mk4pT4iVYcZKvNHJGOkL0gfDEGipZldUgQOjCXmmTzAhVfQWAcZbiGAV1HwnvUWfI1VvCgliJOyQuZ0ROHBDhTtoiurBsvtyeyPpKls0A7k76mISHR0DEhzYeWC%2BXf3q9TMeBpDgqiOHctTs1rwCBaQwj1o1lftGv3XXOkPVZpGrM67gCsM3JC%2Bj9PWc66P3/HykuPWf4u%2B7LcNYolc6UjTeyhLWSuq81wZrHlj0vH7YZp6iTGwPdBC4Se6nG4jfGxWaO7H6w8sQembcIT4BUkBMfTYIgSrEJFwLIG1riQ438TANTQ0soVPWI4cXW0B3kW/QSAIID80nSZs6xmQbfNLvKUGBJm7E%2Bb6eM1K9n9Dh2AX10VUDyPGxuIU%2BUFZCfQnmDM2u1gvDeXut6aj99NrpLl7Bhf0zSAtYzFiJrTGRCy9m%2BhlqGMsVYqezopSpSopZj8YgVnEgjZkqGF%2BEmYhj28pTM28JROpdImLuwidnuFErJmlwAQCpNgafjAWI2oGlg3ZwZqxHeNAWqJfGaZYBIlVm1ycaYvcl74GbcnHNQ/M7hsgQgegDBHy6xdK/wD2D2M3eMF0Z%2BdXej0lgldjVmFnc%2BcJ%2BJ7CQiHbdAbccqZJ700TLbIc%2BIDKBRZc8qRaGROP8JhjGDHEXLqDyFcdxlrkdf7oE0wjSfon33LwmNAV93xzbtxmLH10dE84w5KPCcGujMHw6Rs3TcNRUz8Gn/5KhAExb14BXuuQ1RmWZAsMis0SmTWbLjAKWCyUty8g9y%2BL6Nb/SXTDKPG8p9FXjqM5fYOK8sFPiwUSdsl2LyTBB%2BEb3qzAWNq4Ji3ClJpW7a%2B9KmKBZOkiW5mX4fJGbfX3%2BuxbfaOcYYKlsVCOfCTQUvT04CLWDieFMGDPfW4v/vvCNN9KdUM7zHL8FYM3oCt1F40cn67nPkzBptjJi5lrgKM9Ddpn8YlKPX3YdpDjyGEnCE9ISkhVAQiE7/16vz6TLrGlzf9OMA7uXuxsf575uJIubedAYbRf0C/dVwlXJpzXBQUPM%2BcT/Mt8D2DL/s14YdmYlMZCEA9x%2BVoddIpzN1u3egGuFFAqRsvgah3F3LeQS5WgkpvafamA5VC7rbM0ncd3ZqJdIkpCkqF4ar6LGC6bb3ggACQK7YdTbQRkkaw2Nm2o15C1JrtUx2oz2c%2BVAVMLN6YQP1KJoiLLStVqouuq5tJegA8clTD2IbLfgEhJDOGeTHrc3HCPWYI3xrspyrPFD9cQ17fEW494qU9lCJ4wr%2B1ZeXIaO8ll7x3r9%2BkbaIykhe5dBYRaYTqr%2BU1ntN6gquwJzm/wGO0r/T%2BLjncAKgnXd%2BhxtWVkfDgRrlAWWK2i9BaNHC%2BOIrhaTOaLrSUUaA6sH7b6rb0e9ZWDp9srhC7tiKpIKoVK6wgqw9B7qELPIkDY6H5XkJ1HomhXcUpXJZslPjc8emqxVX7eJani9cFvjHrlQ6iQJJs98Ms1Wa6u4LLuaZW/SBFrus8sCjY6m1uWLNSrqKwjUDUfR56gZ8TGU6Ps53EuVvdSBAdbUjMSdXee5sdMBFjSQVdsAY%2BmySFEGymfT2Tg38YSCnpnvfLKtUczcyc5Gi64Uh3vSLaGL2gA3gdAS15kzbcWkNvgwwm7OxfyVLRNsCqjOQEhLdPpkW%2BJkIs8tFLXFITt2ac90j1o/pcawKVci8M5sC8677SEEdf%2BL2jdRXBclA7FcA3XZh90ysLTojFzvpLZl2Ycya0Kzkuf/Y1nqxUhc7HjfmhsbT4ZgeEtcZs9h3lYmcFrvznaaNt%2BaYgJnsppokzN9gWaBZbw0mTBJLEYstY8l6MNhMTeJoRfao7Vml62tkM2TATOfr0GYgdmkScnrehQ2aMTcZY2LviTh9FlDlbAG1jZNoeKT0rPg15thwFKFU5X95pbgijfQCE49Q76xhrNlQWPLdD%2BNMKn3Sjy8zQXzInNhmFBWNs46sWJ%2BFX3OLiRtDguFn8y8sWaHx/18408mQWjCXM0Z6w%2BHJS1OMvaNGvMkobdk1fKaEpP9YF0ILZ0%2BiUEfV3yCVehnd6jTTy2W/YT7Hf42gaWW64zXxF7vtCdVpnMDUV9EWjLiYAacjCWN%2B21B6ouXCi9euY4IkpI6sHuvnxGuEit99lr%2By17nsGWv49euSSWtbPjotImA2YMJTQA5cTW9LgMcbn32EYlEWGxis1Zl4EJZUIokCYnPFsVKq2aBa4s7TaGzEGLTnm7Zx8quZ5IY67fehPMHNp7UlfrJVYGl7chDrUJqFoY9ySM1ublvIS1jOZ3GlwcCImptYuUjQycMKhPPb%2BlPFm609r9XvjZ%2BNOThOlHJFG%2B9mfWBbV3xBJhMBcvuoV6dPCSk%2Bp6oCefp2psU2eItlcoFPkNQu7a8KtQqaQVmWUcnK/zZY/%2BL3h0oM%2Bmc%2BvM6yCn/S/KumRNechEwMH4DV/bBXaPhnXlR4n7%2ByD18hu/mvxsv9DZzxu2yVhBJySQ2rDCSEvQWXCrWXp0UyHmaNW1maJHRtFCEeXQVbLUuFlh5Rmj7prAm0iAgzwUMjLaTWuoHDF0AhrRUUF14HVWnanjwyqt4xE2Ec2RnVkgL6Uxniyl0R8V8qQS7l21/9lLGhqv09JMOZcvDChMfrk9t3PBOFslOAKveHzBfZ1nZmTCZJz2SgWToUt/CBZGU5kpnx1/URs/jC%2BPIn8rTRAh2IYwG%2BtM3NbNNqsbZjU%2B8ibdhrQKsNeXlO0KCmzqyYMRSnVstTXGLwNLp3PG3f81sTpPEoU%2B88mtqdgtYWWGZI%2BourJ6m/6Tls3NYDN9nM3TH30yBxuq2J8D2JDBW7cW7gNLY%2ByjiOX0LjY5jWf1duT7m2bKt9zbeyCzi%2BGQwVgxicjtdBJ3Tl2aVvaYmJd8IPmSw46%2BVE1h5%2Bqi8FXbriX6nji3reX%2BJcr1d2PmczA7yax58op7NC9Knf3myuo8lsOY3j7dV/vaX33eqgYHuAGv7Oe%2BbLv9pyjmC1L/%2B8fizk3wBfWEfpdTN%2BvV7b3gZB1QvbhXO//bhr6he/M5br99//ZiDV2/d%2BuFLR9Y7xzdblZNewDHXW/ktP/T47u2fcMy3nrHlAEsfK9aQP89A7Htno0ZKWYkzZgSBmC6/UNwuKsdKCol//OjhhvQ4srYznPcr7uhNc96Tdphf%2BUOmzQ7X%2BfjuRzF53/nWN1t1//nvOzqrZ6jzV/pV5/lTqebz5Mk8jsWroIxknJ3UWv9XARaT6nTWRNqpbZ18GwWKxuSgFmuT13dQiy9S7pQp1zuLN66%2BoAjqe1Gjzd6OUXBlKj8cnsXWtxx7uzETbHCIAZl6kMwCSOXo2g3asTJeqs36Z0TBZV55fHzbevfuz/ikEQ6ohRffef/%2BvfvUN37%2BNn%2B%2B994DD7wsLdgsB/xJB%2BoGvSxvXM7CsESk9/9vUjpHna9ovJatxCnXRlfn6WCvT3y06KS2MMTJ8WrnADJmRqt0WgWp/eajj5WmIuYnSyklN6qPlbhC8e7MEI1zd9oXAV7g9NfVn1jpCT9Jn%2Bkk1ciccSwfIm2FsmLic/DJ3/9JzQUcO941WYFf1c32LTWSXG%2B4QR/rwQcfRfKP//TJoz885jjIZuCZMpCEKLQwHMi%2BfVUuoBZgpRO0wgTQHE0MTyRTwj1UC7tIz2yEA8/U8lrTqNMglQkGHAqCT44Ljf/yHaXDBc5WLeu%2B%2B7bmtXVmeLZkLJPJ9F12/JWFyZrMI0wLF%2Ba13BR%2BJhdBCUFORlelTzVWftlbKHd/Xxjr3n0xvlD0T3zx8cPkbox/GHpry9iT51zM7dloEFHkTeGG1UNZeQ7Ct07sbG/zTpe8nOgMgroTsFYpeSWOby7Z8ZCvGbnZK5yAtdPAmqV9jk5N22LxscRkZpfHIauHhH0v5gSsXSlmUJ2L7Skjunn/Vt447MtRzKKegDWVVTzCkpJ1eDGvfjRb32f4NmTKJ2A9FcWnhvKWnrwrS4RtYh99AtZTUcqLSU8eAa/fpy17TYw1ldWtoW5W3ouc9yX3vZRlAtZUFhcfi8q/PMlrz/2/hxOwprKWNfTB2sTfh9%2BBPQFrKmOtoU/x5%2BVQG32qYgLW00Va/vcb/z3nRu81AevpKr5tYPi9EhOwprK7ZQLWVCZgTeX8lP8CuDenorrKqfIAAAAASUVORK5CYII%3D" style="float: left; padding: 1em;" />
        Lorem ipsum dolor sit amet, consectetuer <strong>adipiscing</strong> elit. Sed non risus. Suspendisse lectus <strong>tortor</strong>, dignissim sit amet, adipiscing nec, ultricies sed, dolor. 
        Cras elementum <em>ultrices</em> diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi. 
        
        <img src="./images/image_demo.jpg" style="float: right; clear: both; padding-left: 0.5em; padding-top: 0.5em;" width="220" />
        Proin porttitor, orci nec nonummy molestie, enim est eleifend mi, non fermentum diam nisl sit amet erat. 
        Duis semper. Duis arcu massa, scelerisque vitae, <strong>consequat</strong> in, pretium a, enim. Pellentesque congue. 
        Ut in risus volutpat <em>libero</em> pharetra tempor. Cras vestibulum bibendum augue. 
        Praesent egestas leo in pede. Praesent blandit odio eu enim.
        
        <table style="float: right; " border="1">
        <tr>
          <td>test</td>
          <td>foo</td>
        </tr>
        </table>
        
        <hr style="clear: both;" />
        Pellentesque sed dui ut augue blandit sodales. 
        Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam nibh. 
        Mauris ac mauris sed pede pellentesque fermentum. 
    </td>
    <td>fooo</td>
  </tr>
</table>

</body>

</html>

HTML;


$dompdf->loadHtml($html);
// $dompdf->setPaper('A5', 'landscape');
// $dompdf->setPaper( 'A5', 'portrait' );
$dompdf->render();
$dompdf->stream('document.pdf', array("Attachment" => false));
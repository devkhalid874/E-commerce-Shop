==============   USER  =============

khalidmajeed854@gmail.com
12341234

ali@gmail.com
12345678

=============  ADMIN   ===============

admin@gmail.com
12121212




========  Command for Generating Pdf in Laravel ===============

1st command
composer require barryvdh/laravel-dompdf

2nd command 
php artisan vendor:publish --provider="Barryvdh\DomPDF\ServiceProvider"


then include this code in function and set this 

   use Barryvdh\DomPDF\Facade\Pdf;

    $pdf = Pdf::loadView('pdf.invoice', $data);
    return $pdf->download('invoice.pdf');



PREPARED BY SATRIA ARDI PERDANA (codesatria.com)

Langkah - langkah menggunakan source CI dari git ini:
1. Checkout dan letakkan di folder htdocs
2. Install mpdf dan PhpOffice/PhpSpreadsheet menggunakan composer. Atau jika menggunakan folder vendor dari github ini berikan akses dengan perintah sudo chmod 777 -R vendor/
3. Untuk setting default controller buka ../application/config/routes.php dan ubah jadi $route['default_controller'] = 'ReportPDF';
4. untuk setting koneksi database ada pada ./application/config/database.php. untuk usernamenya disini menggunakan masih root password kosong dan database name = report_nilai, file dumpnya ada di git ini.
5. import report_nilai.sql ke database mysql
6. BUka pada browser https://localhost/tugas_p11_satriaardiperdana_pdf_xls-main/.
7. tugas_p11_satriaardiperdana_pdf_xls-main dapat dirubah dengan rename di htdocs.

Jika kesulitan hub wa 081315000315

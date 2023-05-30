# Google Sheets -> PHP Array

This is a quick way to fetch data from publicly accessible Google sheets.

To use this plugin, first create a service account with access to Google Sheets,
(or use the existing one added to the dev vault in one pass) and add the json key to this plugin (named credentials.json). Then run composer install.

After that, you can use the tm_get_sheet() helper function, passing in a sheet ID and 
the name of the tab you want to fetch. An example:

$sheet_id = 'SHEET_ID_FOUND_IN_URL';
$tab = 'Sheet1';
$data = tm_get_sheet( $sheet_id, $tab );
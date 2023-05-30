<?php 
/**
 * @package  tm_sheets
 */
namespace TmSheets;

class Sheets
{	
	protected $client;

	public function __construct()
	{
		$credentials =  TM_SHEETS_PATH . 'credentials.json';
		
		$this->client = new \Google_Client();
		$this->client->setApplicationName("Sheets for WordPress");
		$this->client->setAuthConfig($credentials);
		$this->client->setScopes(['https://www.googleapis.com/auth/spreadsheets.readonly']);
	}

	public function get_data($sheet_id, $tab)
	{
		$service = new \Google_Service_Sheets( $this->client );

		$data = $service->spreadsheets_values->get( $sheet_id, $tab );

		return $this->transform_headers($data['values']);
	}

	public function transform_headers($data)
	{
		$headers = array_shift($data);

		return array_map( function( $row ) use ( $headers ) {
			return array_combine( $headers, array_pad( $row, count( $headers ), '' ) );
		}, $data );
		
	}
}
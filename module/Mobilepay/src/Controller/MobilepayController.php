<?php
/**
* StoneHMIS (http://stonehmis.afyaresearch.org/)
*
* @link      http://github.com/stonehmis/stone for the canonical source repository
* @copyright Copyright (c) 2009-2019 Afya Research Africa Inc. (http://www.afyaresearch.org)
* @license   http://stonehmis.afyaresearch.org/license/options License Options
* @author    smalio
* @since     25-01-2019
*/

namespace Mobilepay\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Mobilepay\Model\PaymentConfirmation;



class MobilepayController extends AbstractActionController
{

    protected $mobilepayService;

    protected $mobilepayMenuService;

    protected $serviceManager;

    public function setMobilepayService($mobilepayService)
    {
        return $this->mobilepayService = $mobilepayService;
    }

    public function setMobilepayMenuService($mobilepayMenuService)
    {
        return $this->mobilepayMenuService = $mobilepayMenuService;
    }

    public function setServiceManager($serviceManager)
    {
        return $this->serviceManager = $serviceManager;
    }

    public function indexAction()
    {
        return new ViewModel();
    }
    
    public function callbackAction()
    {
        try {
            // Set the response content type to application/json
            // header("Content-Type:application/json");
            $resp = '{"ResultCode":0,"ResultDesc":"Validation passed successfully"}';
            // read incoming request
            $postData = file_get_contents('php://input');
            $filePath = "/home/smalio/Sites/mobile_pay/messages.log";
            // error log
            $errorLog = "/home/smalio/Sites/mobile_pay/errors.log";
            // Parse payload to json
            $jdata = json_decode($postData, true);
            // perform business operations here
            // open text file for logging messages by appending
            $file = fopen($filePath, "a");
            // log incoming request
            fwrite($file, $postData);
            fwrite($file, "\r\n");
        } catch (\Exception $ex) {
            // append exception to file
            $logErr = fopen($errorLog, "a");
            fwrite($logErr, $ex->getMessage());
            fwrite($logErr, "\r\n");
            fclose($logErr);
            // set failure response
            $resp = '{"ResultCode": 1, "ResultDesc":"Validation failure due to internal service error"}';
        }
        // log response and close file
        // fwrite($file, $resp);
        fclose($file);
        // echo response
        // echo $resp;
    }
    public function payAction()
    {
        $formElementManager = $this->serviceManager->get('FormElementManager');
        $form = $formElementManager->get('Mobilepay\Form\TestPhoneForm');
        $request = $this->getRequest();
        $paymentTable = $this->serviceManager->get('Mobilepay\Model\PaymentConfirmationTable');
        
        
        if ($request->isPost()) {
            
            // header("Content-Type:application/json");
            $phone = $request->getPost('phone_number');
            $shortcode = '174379';
            
            $passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
            
            $consumerkey = "mxHfXZgmIrq6aGkm0D4UOUV3ECp4g1OI";
            
            $consumersecret = "4KmjMiOe0sIIcnZS";
            
                  
            $authenticationurl = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
            
            $registerurl = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl';
            
        
            // Request headers
            $headers = [
                'Content-Type: application/json; charset=utf-8'
            ];
            
            // Request
            $ch = curl_init($authenticationurl);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            // curl_setopt($ch, CURLOPT_HEADER, TRUE); // Includes the header in the output
            curl_setopt($ch, CURLOPT_HEADER, FALSE); // excludes the header in the output
            curl_setopt($ch, CURLOPT_USERPWD, $consumerkey . ":" . $consumersecret); // HTTP Basic Authentication
            $result = curl_exec($ch);
            
            $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $result = json_decode($result);
            
            $access_token = $result->access_token;
            
            curl_close($ch);
            
            $date = time();
            
            $timestamp = date("Ymdhms", $date);
            
            $password = base64_encode($shortcode . $passkey . $timestamp);
            
            // echo $password;
            $transactiondesc = "Successful";
            $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
            $curlInitResult = curl_init($url);
            curl_setopt($curlInitResult, CURLOPT_URL, $url);
            curl_setopt($curlInitResult, CURLOPT_HTTPHEADER, array(
                'Content-Type:application/json',
                'Authorization:Bearer ' . $access_token
            )); // setting custom header
            
            $curl_post_data = array(
                // Fill in the request parameters with valid values
                'BusinessShortCode' => $shortcode,
                'Password' => $password,
                'Timestamp' => $timestamp,
                'TransactionType' => 'CustomerPayBillOnline',
                'Amount' => '5',
                'PartyA' => $phone,
                'PartyB' => $shortcode,
                'PhoneNumber' => $phone,
                'CallBackURL' => 'https://19a288c4.ngrok.io/mobilepay/mobilepay/callback',
                'AccountReference' => 'Sharon',
                'TransactionDesc' => $transactiondesc
            );
            // $CallbackURL = 'https://webhook.site/adca9f7a-5471-4464-b493-4d05251ec658';
            $data_string = json_encode($curl_post_data);
            curl_setopt($curlInitResult, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curlInitResult, CURLOPT_POST, true);
            curl_setopt($curlInitResult, CURLOPT_POSTFIELDS, $data_string);
            
            $curl_response = curl_exec($curlInitResult);
            var_dump($curl_response);
            exit;
            $file = 'http://localhost.mobilepay/messages.log';
            fopen($file, "r");
            $safResp = file_get_contents($file);
            $decoded = json_decode($safResp, true);
//             flatten the array so we get what we need only
            $flatArray = new \RecursiveIteratorIterator(new \RecursiveArrayIterator($decoded));
            $list = iterator_to_array($flatArray, false);
            var_dump($list);
            exit;
            if (count($list) == 13) {
                unset($list[4], $list[6], $list[8], $list[9], $list[11]);
                $list = array_merge($list);
                $mpesapayment_details = [
                    'appnt_payment_confirmation_id' => '',
                    'merchant_request_id' => $list[0],
                    'checkout_request_id' => $list[1],
                    'result_code' => $list[2],
                    'result_desc' => $list[3],
                    'service_cost' => $list[4],
                    'mpesa_transaction_id' => $list[5],
                    'mpesa_transaction_date' => $list[6],
                    'appnt_user_phone_number' => $list[7]
                ];
                // saving i to the database
                $paymentModel = new PaymentConfirmation();
                $paymentModel->exchangeArray($mpesapayment_details);
                $paymentTable->savePaymentConfirmation($paymentModel);
            } else {
                echo "please check your details carefully";
             
            }
            
        } else {
            return [
                'form' => $form
            ];
        }
        
        $formElementManager = $this->serviceManager->get('FormElementManager');
        return [
            'form' => $formElementManager->get('Mobilepay\Form\TestPhoneForm')
        ];
    }
        
    }


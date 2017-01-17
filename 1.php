<?php

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Uri;

require __DIR__ . '/vendor/autoload.php';

$token = '3AK1UK2H-5UGG-4CT9-8D10-9WZK4KXPKCV6';
//
//$clientConfig = [
//    'base_uri'                       => 'https://api.nodeping.com/api/1/',
//    \GuzzleHttp\RequestOptions::AUTH => [
//        $token,
//        $token,
//    ],
//];
//
//$client = new Client($clientConfig);
//
////
//$response = $client->request('GET', new Uri('checks'));
//////
////$checks = [];
//if ($response->getStatusCode() === 200) {
//    $checks = \GuzzleHttp\json_decode($response->getBody(), true);
//    file_put_contents('checks.php', var_export($checks, true));
//}

$validator = \Symfony\Component\Validator\Validation::createValidatorBuilder()->addYamlMapping(__DIR__ . '/validation.yml')->getValidator();
$test = new \Adv\Checks\CheckValidator(new \Adv\Checks\CheckType(\Adv\Checks\CheckType::PING));
$test->setType(\Adv\Checks\CheckType::DNS);
//$test->setContentString('DNS');
//$test->setFollow(true);
//$test->setPort(11);
//$test->setDnsType('qwe');
//$test->setUsername('wefwef');
//$test->setInvert('false');
var_dump($validator->validate($test));


//$from = new DateTime();
//$from->sub(new DateInterval('P1M'));
//
//$slaChecker  = new \Adv\SlaNodeChecker($client, $token);
//$slaChecker->setFilterTypes([
//    'HTTP',
//    'HTTPADV',
//    'HTTPCONTENT'
//]);
//$slaChecker
//    ->setFromDate($from)
//    ->loadChecks()
//    ->loadUptime();
//
//print_r($slaChecker->getChecks());


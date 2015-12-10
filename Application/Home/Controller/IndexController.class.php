<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller{
    public function index(){
        $this->display();
    }
    
    public function main(){
        $account = I('account');
        $password = I('password');
        $day = $password % 100;
        
        if(!$account || !$password || ($password < 0101 || $password > 1231) || ($day < 1 || $day > 31)){
            $this->display('tips');
            exit;
        }
        
        $data = $this->cache($account, md5($password));
            
        $this->assign('data', $data);
        $this->display();
    }
    
    public function cache($account, $password){
        $cache = S('account_'.$account.'_'.$password);
        
        if($cache) return $cache;
        else{
            $data = $this->request($account, $password);
            
            S('account_'.$account.'_'.$password, $data, 600);
            
            return $data;
        }
    }
    
    public function request($account, $password){
        $url = "http://163.177.153.150:8001/sport/api/useraccount/login?account={$account}&password={$password}";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        curl_setopt($ch, CURLOPT_URL, $url);
        //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, $FOLLOWLOCATION);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1); //设为TRUE在输出中包含头信息 

        //excute
        $results = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        list ($header, $body) = explode("\r\n\r\n", $results);
        
        $body = json_decode($body, true);
        //var_dump($body);
        
        if($body['code'] < 0) $this->error($body['code'], $body['message']);

        $isMatched = preg_match('/JSESSIONID=.*?;/', $header, $matches);

        $cookie=str_replace(';', '', $matches[0]);

        $detailUrl='http://163.177.153.150:8001/sport/api/bodymeasure/info';

        $ch = curl_init();    // 初始化CURL句柄 
        $user_agent = "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)";
        
        curl_setopt($ch, CURLOPT_URL,$detailUrl);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postfield);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        //自动跟踪转向;
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        //返回获取的输出的文本流。
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
        curl_setopt($ch, CURLOPT_HEADER, false);

        $header = array(
            "Referer: ".$detailUrl,
            'Accept-Language: zh-cn',
            'Connection: Keep-Alive',
            'Cache-Control: no-cache',
            'Origin: '.$detailUrl,
            'Content-Type: application/x-www-form-urlencoded'
        );

        //如果cookie不为空则添加进header列表;
        if ($cookie != "") {
            array_push($header, "Cookie: $cookie");
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, $header); 
        
        $detail = curl_exec($ch);
        
        curl_close($ch);
        
        $detail = json_decode($detail, true);
        
        if($detail['code'] < 0) $this->error($detail['code'], $detail['message']);
        
        //var_dump($body, $detail);
        return array_merge($body['data'], $detail['data']);
    }
    
    public function error($code, $msg){
        $this->assign('error', array($code, $msg));
        $this->display('error');
        exit;
    }
}
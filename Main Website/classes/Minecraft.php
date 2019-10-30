<?php
class Minecraft {
	
    public function isPremium($username = null)
    {
        return $this->request('https://www.minecraft.net/haspaid.jsp', array('user' => $username)) === 'true'? true : false;
    }
	public function checkServer($username, $server)
    {
        $request = $this->request('https://session.minecraft.net/game/checkserver.jsp', array('user' => $username, 'serverId' => $server));
        return ($request == 'YES') ? true : false;
    }
	    private function request($website, $parameters)
    {
        $request = curl_init();
        curl_setopt($request, CURLOPT_HEADER, 0);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($request, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($request, CURLOPT_FOLLOWLOCATION, 1);
        if ($parameters != null) {
            curl_setopt($request, CURLOPT_URL, $website . '?' . http_build_query($parameters, null, '&'));
        } else {
            curl_setopt($request, CURLOPT_URL, $website);
        }
        $response = curl_exec($request);
        $details = curl_getinfo($request);
        curl_close($request);
        return ($details['http_code'] == 200) ? $response : null;
    }
}
<?php
/*
Plugin Name: List Agents Shortcode
Plugin URI: 
Description: Lista Agentes da API de Culturaenlinea.uy
Author: leotrujillo y leogermani
Version: 1.0
Text Domain:
*/

class ListAgentsShortcode {


    function __construct() {
    
        add_shortcode('list_agents', array(&$this, 'shortcode'));
        add_action( 'wp_enqueue_scripts', array(&$this, 'addCSS') );
        
    }
    
    function addCSS() {
        wp_enqueue_style( 'list-agents-shortcode', plugin_dir_url( __FILE__ ) . '/list-agents.css' );
    }
    
    function get_api_url() {
        
        // no futuro isso pode ser uma opção
        return 'http://culturaenlinea.uy/api/agent/find';
        
    }
    
    function getAgents($params) {
    
        // implementar cache
        
        $url = add_query_arg($params, $this->get_api_url());
        
             
        $response = wp_remote_get( $url, array('timeout' => 20) );

        return wp_remote_retrieve_response_code($response) == 200 ? wp_remote_retrieve_body($response) : false;
    
    }
    
    function maybePrintAvatar($agent) {
        
        if (isset($agent->{'@files:avatar.avatarSmall'}) && is_object($agent->{'@files:avatar.avatarSmall'}) && isset($agent->{'@files:avatar.avatarSmall'}->url)) {
            echo "<img src='".$agent->{'@files:avatar.avatarSmall'}->url."' />";
        }
        
    }
    
    function shortcode($atts, $content) {
		
        if (!is_array($atts)) return;
        
		#$ids = $atts['ids'];
		#$tag = $atts['tag'];
        
        $params = [
            '@select' => 'id,name,files,En_Estado,shortDescription,singleUrl',
            '@files' => '(avatar.avatarSmall,downloads):url'
        ];
        
        if (isset($atts['ids'])) {
            $params['id'] = 'IN(' . $atts['ids'] . ')';
        }
        
        if (isset($atts['departamento'])) {
            $params['En_Estado'] = 'EQ(' . $atts['departamento'] . ')';
        }
        
        if (isset($atts['tag'])) {
            $params['term:tag'] = 'EQ(' . $atts['tag'] . ')';
        }
        
        if (isset($atts['type'])) {
            $params['type'] = 'EQ(' . $atts['type'] . ')';
        }
        
        if (isset($atts['seals'])) {
            $params['@seals'] = $atts['seals'];
        }
        
                
        $result = $this->getAgents($params);
        
        if (false === $result)
            return;
        
        $agents = json_decode($result);
        
        ob_start();
        
        include('template.php');
        
        $html = ob_get_clean();
        
        return $html;
		
	}

}

add_action('init', function() {
    $ListAgentsShortcode = new ListAgentsShortcode;
});


?>

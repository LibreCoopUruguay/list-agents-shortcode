<div class="content">
<div class="list_agents">
    
    <?php foreach ($agents as $agent): ?>
    
    <!--  <div class="agent-continer">     -->
        <div class="list_agents_item">
        
            <p class="agent-description">
                <?php $this->maybePrintAvatar($agent); ?>
                
                <a class="agent-title" href='<?php echo $agent->singleUrl; ?>'>
                    <?php echo $agent->name; ?>
                </a>
                
                <p>
                    <?php echo $agent->shortDescription; ?>
                    <a class="vermas" href='<?php echo $agent->singleUrl; ?>'>
                        Ver más
                    </a>
                </p>
            
              
            </p>
            
            <p class="meta">
                <b>Departamento:</b> <?php echo $agent->En_Estado; ?>
            </p>
        
        </div>
      
      <!-- </div> -->   
    
    
    <?php endforeach; ?>
    
</div>
</div>

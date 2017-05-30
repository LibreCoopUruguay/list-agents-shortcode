<div class="list_agents">
    
    <?php foreach ($agents as $agent): ?>
    
        
        <div class="list_agents_item">
        
            <p class="agent-description">
                <?php $this->maybePrintAvatar($agent); ?>
                
                <a class="agent-title" href='<?php echo $agent->singleUrl; ?>'>
                    <?php echo $agent->name; ?>
                </a>
            
              
            </p>
            
            <p class="meta">
                <b>Departamento:</b> <?php echo $agent->En_Estado; ?>
            </p>
        
        </div>
        
    
    
    <?php endforeach; ?>
    
</div>

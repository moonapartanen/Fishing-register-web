<?php
$kysymysnro = "";
$kysymystyyppi = "";
$otsikko = "";
$kalat = "";
$pyydykset = "";
$haittatekijät = "";
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
use Cake\Log\Log;
?>
<div class="body">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                
            </div>
            <div class="col-md-6">
                <div class="form-container">
                    <h3 class="text-center">Hei <?= $username; ?>, ole hyvä ja täytä kysely</h3>
                    <?= $this->Form->create(null, ['url' => ['controller' => 'Form', 'action' => 'index']]); ?> 
                    <?php foreach ($kyselyt as $kysely):
                        
                        $kysymysnro = $kysely["c"]["kysymysnro"];
                        $kysymystyyppi = $kysely["c"]["kysymystyyppi_id"];
                        $otsikko = $kysely["c"]["kysymysotsikko"];
                        
                        echo "<div class='form-group'>";
                        if ($kysymystyyppi == 1) {
                            echo $this->Form->control($kysymysnro, array (
                                'type' => 'textarea',
                                'label' => $kysymysnro . ". " . $otsikko
                            )); 
                            echo "</div>";
                        }
                        elseif ($kysymystyyppi == 2) {
                            echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko);
                            echo $this->Form->radio('kylla-ei', ['Kyllä','Ei']);
                            echo "</div>";
                        }
                        elseif ($kysymystyyppi == 3) {
                            echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko);
                            echo $this->Form->radio('kalastusalueet', $kalastusalueet);
                            echo "</div>";
                            
                        }
                        elseif ($kysymystyyppi == 4) {
                            echo $this->Form->control($kysymysnro, array (
                                'type' => 'number',
                                'max' => 31,
                                'label' => $kysymysnro . ". " . $otsikko
                            ));
                            echo "</div>";
                            
                        }
                        elseif ($kysymystyyppi == 5) {
                            echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko);
                            
                            echo $this->Form->input('', array (
                                'type' => 'select',
                                'id' => 'select-resource',
                                'label' => 'Valitse pyydys',
                                'empty' => 'Valitse',
                                'options' => $resurssit_pyydykset,
                            ));
                            echo $this->Form->input('', array (
                                'type' => 'select',
                                'id' => 'select-fish',
                                'class' => 'hidden',
                                'label' => 'Valitse kala',
                                'empty' => 'Valitse',
                                'options' => $resurssit_kalat,
                            ));
                            echo $this->Form->input('', array (
                                'type' => 'select',
                                'id' => 'select-prob',
                                'class' => 'hidden',
                                'label' => 'Haittatekijät',
                                'empty' => 'Valitse',
                                'options' => $resurssit_haittatekijat,
                            ));                            
                            echo $this->Form->control('', array (
                                'id' => 'fish-amount',
                                'class' => 'hidden',
                                'label' => 'Määrä (kg)'
                            ));
                            echo "<a id='add' class='btn btn-default hidden'><i class='fa fa-plus' aria-hidden='true'></i></a></div>";
                            
                        }
                        elseif ($kysymystyyppi == 6) {
                            echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko);
                            echo "</div>";
                            
                        }
                        elseif ($kysymystyyppi == 7) {
                           echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko);
                           echo "</div>";
                            
                        }
                        elseif ($kysymystyyppi == 8) {
                            echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko);
                            echo "</div>";
                            
                        }
                        elseif ($kysymystyyppi == 9) {
                            echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko);
                            echo "</div>";
                            
                        }
                        elseif ($kysymystyyppi == 10) {
                            echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko);
                            echo "</div>";
                            
                        }
  

                    endforeach; ?>

                    <?= $this->Form->button('Lähetä', array('class' => 'btn btn-default')) ?>
                    <?= $this->Form->end() ?> 
                </div>
            </div>
            <div class="col-md-3">
                
            </div>
        </div>    
    </div>
</div>

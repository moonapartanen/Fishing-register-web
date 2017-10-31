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
?>
<div class="body">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                
            </div>
            <div class="col-md-6">
                <div class="form-container">
                    <h3 class="text-center">Hei <?= $username; ?>, ole hyvä ja täytä kysely</h3>
                    <?= $this->Form->create($form, ['url' => ['controller' => 'Form', 'action' => 'index']]); ?> 
                    <?php foreach ($surveys as $survey):
                        
                        $kysymysnro = $survey["c"]["kysymysnro"];
                        $kysymystyyppi = $survey["c"]["kysymystyyppi_id"];
                        $otsikko = $survey["c"]["kysymysotsikko"];
                        //$vastaus = $survey["v"]["vastaus"];
                        echo "<div class='form-group'>";
                        if ($kysymystyyppi == 1) {
                            echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko);
                            echo $this->Form->textarea($kysymysnro, ['class' => '']);
                            //echo $this->Form->label($kysymysnro, $vastaus);
                            /*echo $this->Form->checkbox($vastaus, [
                                'value' => $vastaus,
                            ]);           */              
                            echo "</div>";
                        }
                        elseif ($kysymystyyppi == 2) {
                            echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko);
                            echo $this->Form->radio(
                                'favorite_color',
                                [
                                    ['value' => 'r', 'text' => 'Red', 'style' => 'color:red;'],
                                    ['value' => 'u', 'text' => 'Blue', 'style' => 'color:blue;'],
                                    ['value' => 'g', 'text' => 'Green', 'style' => 'color:green;'],
                                ]
                            );
                            echo "</div>";
                        }
                        elseif ($kysymystyyppi == 3) {
                            echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko);
                            echo "</div>";
                            
                        }
                        elseif ($kysymystyyppi == 4) {
                            echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko);
                            echo "</div>";
                            
                        }
                        elseif ($kysymystyyppi == 5) {
                            echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko);
                            echo $this->Form->input('resurssit_nimi', array (
                                'type' => 'select',
                                'id' => 'select-resource',
                                'label' => 'Valitse pyydys',
                                'options' => [1,2,3,4,5]
                            ));
                            echo $this->Form->input('', array (
                                'type' => 'select',
                                'id' => 'select-fish',
                                'class' => 'hidden',
                                'label' => 'Valitse kala',
                                'options' => [1,2,3,4,5]
                            ));
                            echo $this->Form->input('', array (
                                'type' => 'text',
                                'id' => 'fish-amount',
                                'class' => 'hidden',
                                'label' => 'Määrä (kg)',
                                'options' => [1,2,3,4,5]
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

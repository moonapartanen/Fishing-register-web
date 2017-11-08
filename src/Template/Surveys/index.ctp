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
            <div class="col-md-2">
                
            </div>
            <div class="col-md-8">
                <div class="form-container">
                    <h3 class="text-center">Hei <?= $username; ?>, ole hyvä ja täytä kysely</h3>
                    <?= $this->Form->create(null, ['url' => ['controller' => 'Form', 'action' => 'index']]); ?> 
                    <?php foreach ($kyselyt as $kysely):
                        
                        $kysymysnro = $kysely["c"]["kysymysnro"];
                        $kysymystyyppi = $kysely["c"]["kysymystyyppi_id"];
                        $otsikko = $kysely["c"]["kysymysotsikko"];
                        
                        echo "<div class='form-group'>";
                        if ($kysymystyyppi == 1) {
                            echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko, ['class' => "label-bold"]);
                            echo $this->Form->control($kysymysnro, array (
                                'type' => 'textarea',
                                'label' => false,
                                'class' => 'label-bold'
                            )); 
                            echo "</div>";
                        }
                        elseif ($kysymystyyppi == 2) {
                            echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko, ['class' => "label-bold"]);
                            echo $this->Form->radio('kylla-ei', ['Kyllä','Ei']);
                            echo "</div>";
                        }
                        elseif ($kysymystyyppi == 3) {
                            echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko, ['class' => "label-bold"]);
                            echo $this->Form->radio('kalastusalueet', $kalastusalueet);
                            echo "</div>";
                            
                        }
                        elseif ($kysymystyyppi == 4) {
                            echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko, ['class' => "label-bold"]);
                            echo $this->Form->control($kysymysnro, array (
                                'type' => 'number',
                                'max' => 31,
                                'label' => "Tammikuu",
                                'name' => 'tammi'
                            ));
                            
                            echo $this->Form->control($kysymysnro, array (
                                'type' => 'number',
                                'max' => 31,
                                'label' => "Helmikuu",
                                'name' => 'helmi'
                            ));

                            echo $this->Form->control($kysymysnro, array (
                                'type' => 'number',
                                'max' => 31,
                                'label' => "Maaliskuu",
                                'name' => 'maalis'
                            ));

                            echo $this->Form->control($kysymysnro, array (
                                'type' => 'number',
                                'max' => 31,
                                'label' => "Huhtikuu",
                                'name' => 'huhti'
                            ));

                            echo $this->Form->control($kysymysnro, array (
                                'type' => 'number',
                                'max' => 31,
                                'label' => "Toukokuu",
                                'name' => 'touko'
                            ));

                            echo $this->Form->control($kysymysnro, array (
                                'type' => 'number',
                                'max' => 31,
                                'label' => "Kesäkuu",
                                'name' => 'kesa'
                            ));

                            echo $this->Form->control($kysymysnro, array (
                                'type' => 'number',
                                'max' => 31,
                                'label' => "Heinäkuu",
                                'name' => 'heina'
                            ));

                            echo $this->Form->control($kysymysnro, array (
                                'type' => 'number',
                                'max' => 31,
                                'label' => "Elokuu",
                                'name' => 'elo'
                            ));

                            echo $this->Form->control($kysymysnro, array (
                                'type' => 'number',
                                'max' => 31,
                                'label' => "Syyskuu",
                                'name' => 'syys'
                            ));

                            echo $this->Form->control($kysymysnro, array (
                                'type' => 'number',
                                'max' => 31,
                                'label' =>  "Lokakuu",
                                'name' => 'loka'
                            ));

                            echo $this->Form->control($kysymysnro, array (
                                'type' => 'number',
                                'max' => 31,
                                'label' => "Marraskuu",
                                'name' => 'marras'
                            ));

                            echo $this->Form->control($kysymysnro, array (
                                'type' => 'number',
                                'max' => 31,
                                'label' => "Joulukuu",
                                'name' => 'joulu'
                            ));
                         
                            echo "</div>";
                            
                        }
                        elseif ($kysymystyyppi == 5) {
                            echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko, ['class' => "label-bold"]);
                            
                            echo $this->Form->input('', array (
                                'type' => 'select',
                                'id' => 'select-resource',
                                'label' => 'Valitse pyydys',
                                'empty' => 'Valitse',
                                'options' => $resurssit_pyydykset,
                            ));
                            
                            echo '<div id="select-fish" class="hidden">';
                            echo $this->Form->input('', array (
                                'type' => 'select',
                                'label' => 'Valitse kala',
                                'empty' => 'Valitse',
                                'options' => $resurssit_kalat,
                            ));              
                            echo "</div>";
                            
                            echo '<div id="fish-amount" class="hidden">';
                            echo $this->Form->control('', array (
                                'label' => 'Määrä (kg)',
                                'id' => 'fish-amount-kg'
                            ));
                            echo "</div>";
                            
                            echo "<a id='add' class='btn btn-default hidden'><i class='fa fa-plus' aria-hidden='true'></i></a></div>";
                            
                            echo "<div id='catch-table' class='table-responsive'>";
                                echo "<table class='table table-hover '>";
                                    echo "<thead>"
                                            . "<tr>"
                                                . "<th>Pyydys</th>"
                                                . "<th>Kala</th>"
                                                . "<th>Määrä</th>"
                                                . "<th>Poista</th>"
                                            . "</tr> "
                                        . "</thead>";
                                    echo "<tbody>"
                                            . "<tr>"
                                            . "</tr> "
                                        . "</tbody>";                                    
                                echo "</table>";
                            echo "</div>";
                            
                            
                        }
                        elseif ($kysymystyyppi == 6) {
                            echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko, ['class' => "label-bold"]);
                            echo "</div>";
                            
                        }
                        elseif ($kysymystyyppi == 7) {
                           echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko, ['class' => "label-bold"]);
                           echo "</div>";
                            
                        }
                        elseif ($kysymystyyppi == 8) {
                            echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko, ['class' => "label-bold"]);
                            echo $this->Form->input('', array (
                                'type' => 'select',
                                'id' => 'questiontype-eight-select',
                                'label' => 'Valitse kala',
                                'empty' => 'Valitse',
                                'options' => $resurssit_kalat,
                            )); 
                            echo '<div id="questiontype-eight-radio" class="hidden">';
                            echo $this->Form->radio('questiontype-eight', ['Yleistynyt','Vähentynyt', 'Ei muutosta']);
                            echo '</div>';
                            
                            echo "<a id='add-fishtype-eight' class='btn btn-default hidden'><i class='fa fa-plus' aria-hidden='true'></i></a>";
                            echo "</div>";
                            
                        }
                        elseif ($kysymystyyppi == 9) {
                            echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko, ['class' => "label-bold"]);
                            
                            foreach ($resurssit_haittatekijat as $tekija) :
                                echo $this->Form->label($kysymysnro, $tekija, ['style' => 'font-weight: 500;']);
                                echo $this->Form->radio('haittatekijat' . "-" . $tekija, ['Haittaa merkittävästi','Haittaa kohtalaisesti', 'Ei haittaa']);
                            endforeach;
                            echo "</div>";
                            
                        }
                        elseif ($kysymystyyppi == 10) {
                            echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko, ['class' => "label-bold"]);
                            echo $this->Form->radio('arvio', ['Merkittävä','Kohtalainen', 'Ei merkitystä', 'Ei tietoa']);
                            echo $this->Form->control('', array (
                                'type' => 'textarea',   
                                'label' => 'Lisätietoja'
                            ));                             
                            echo "</div>";
                            
                        }
  

                    endforeach; ?>

                    <?= $this->Form->button('Lähetä', array('class' => 'btn btn-default')) ?>
                    <?= $this->Form->end() ?> 
                </div>
            </div>
            <div class="col-md-2">
                
            </div>
        </div>    
    </div>
</div>

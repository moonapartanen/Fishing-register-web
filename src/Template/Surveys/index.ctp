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
                    <?= $this->Form->create(null, ['url' => ['controller' => 'Form', 'action' => 'index', 'class' => 'form-horizontal']]); ?> 
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
                                'class' => 'label-bold',
                                'required' => true
                            )); 
                            echo "</div>";
                        }
                        elseif ($kysymystyyppi == 2) {
                            echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko, ['class' => "label-bold"]);
                            echo $this->Form->radio('kylla-ei-' . $kysymysnro, ['Kyllä','Ei'], ['required' => true]);
                            echo "</div>";
                        }
                        elseif ($kysymystyyppi == 3) {
                            echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko, ['class' => "label-bold"]);
                            echo $this->Form->radio('kalastusalueet', $kalastusalueet, ['required' => true]);
                            echo "</div>";
                            
                        }
                        elseif ($kysymystyyppi == 4) {
                            echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko, ['class' => "label-bold"]);
                            echo $this->Form->control($kysymysnro, array (
                                'type' => 'number',
                                'max' => 31,
                                'min' => 0,
                                'label' => "Tammikuu",
                                'name' => 'tammi',
                                'required' => true
                            ));
                            
                            echo $this->Form->control($kysymysnro, array (
                                'type' => 'number',
                                'max' => 31,
                                'min' => 0,
                                'label' => "Helmikuu",
                                'name' => 'helmi',
                                'required' => true
                            ));

                            echo $this->Form->control($kysymysnro, array (
                                'type' => 'number',
                                'max' => 31,
                                'min' => 0,
                                'label' => "Maaliskuu",
                                'name' => 'maalis',
                                'required' => true
                            ));

                            echo $this->Form->control($kysymysnro, array (
                                'type' => 'number',
                                'max' => 31,
                                'min' => 0,
                                'label' => "Huhtikuu",
                                'name' => 'huhti',
                                'required' => true
                            ));

                            echo $this->Form->control($kysymysnro, array (
                                'type' => 'number',
                                'max' => 31,
                                'min' => 0,
                                'label' => "Toukokuu",
                                'name' => 'touko',
                                'required' => true
                            ));

                            echo $this->Form->control($kysymysnro, array (
                                'type' => 'number',
                                'max' => 31,
                                'min' => 0,
                                'label' => "Kesäkuu",
                                'name' => 'kesa',
                                'required' => true
                            ));

                            echo $this->Form->control($kysymysnro, array (
                                'type' => 'number',
                                'max' => 31,
                                'min' => 0,
                                'label' => "Heinäkuu",
                                'name' => 'heina',
                                'required' => true
                            ));

                            echo $this->Form->control($kysymysnro, array (
                                'type' => 'number',
                                'max' => 31,
                                'min' => 0,
                                'label' => "Elokuu",
                                'name' => 'elo',
                                'required' => true
                            ));

                            echo $this->Form->control($kysymysnro, array (
                                'type' => 'number',
                                'max' => 31,
                                'min' => 0,
                                'label' => "Syyskuu",
                                'name' => 'syys',
                                'required' => true
                            ));

                            echo $this->Form->control($kysymysnro, array (
                                'type' => 'number',
                                'max' => 31,
                                'min' => 0,
                                'label' =>  "Lokakuu",
                                'name' => 'loka',
                                'required' => true
                            ));

                            echo $this->Form->control($kysymysnro, array (
                                'type' => 'number',
                                'max' => 31,
                                'min' => 0,
                                'label' => "Marraskuu",
                                'name' => 'marras',
                                'required' => true
                            ));

                            echo $this->Form->control($kysymysnro, array (
                                'type' => 'number',
                                'max' => 31,
                                'min' => 0,
                                'label' => "Joulukuu",
                                'name' => 'joulu',
                                'required' => true
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
                            
                            echo '<div id="detail-count" class="hidden">';
                            echo $this->Form->control('kalakg', array (
                                'label' => 'Määrä (kg)',
                                'id' => 'fish-amount-kg'
                            ));

                            echo $this->Form->control('koentakerrat', array (
                                'label' => 'Koentakertojen lukumäärä',
                                'id' => 'tries-count'
                            ));

                            echo $this->Form->control('pyydystenmaara', array (
                                'label' => 'Pyydysten määrä',
                                'id' => 'resource-count'
                            ));
                            
                            echo "<a id='add' class='btn btn-default'><i class='fa fa-plus' aria-hidden='true'></i></a></div>";
                            
                            echo "</div>";

                            echo "<div id='catch-table' class='table-responsive'>";
                                echo "<table class='table table-hover '>";
                                    echo "<thead>"
                                            . "<tr>"
                                                . "<th>Pyydys</th>"
                                                . "<th>Kala</th>"
                                                . "<th>Määrä (kg)</th>"
                                                . "<th>Koentakerrat</th>"
                                                . "<th>Pydyysten määrä</th>"
                                                . "<th></th>"
                                            . "</tr> "
                                        . "</thead>";
                                    echo "<tbody id='catch-row'>"
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
                            foreach ($resurssit_haittatekijat as $tekija) :
                                echo $this->Form->label($kysymysnro, $tekija, ['style' => 'font-weight: 500;']);
                                echo $this->Form->radio($tekija . "-" . $kysymysnro, ['Haittaa merkittävästi','Haittaa kohtalaisesti', 'Ei haittaa'], ['required' => true]);
                            endforeach;
                            
                        }
                        elseif ($kysymystyyppi == 9) {
                            echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko, ['class' => "label-bold"]);
                            echo "<br>";
                            foreach ($resurssit_kalat as $kala) :
                                echo $this->Form->label($kysymysnro, $kala, ['style' => 'font-weight: 500;']);
                                echo $this->Form->radio($kala . "-" . $kysymysnro, ['Yleistynyt','Vähentynyt', 'Ei muutosta'], ['required' => true]);
                            endforeach;
                            
                        }
                        elseif ($kysymystyyppi == 10) {
                            echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko, ['class' => "label-bold"]);
                            echo $this->Form->radio('arvio', ['Merkittävä','Kohtalainen', 'Ei merkitystä', 'Ei tietoa'], ['required' => true]);
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

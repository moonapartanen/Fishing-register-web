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
                    <?= $this->Form->hidden('tutkimusalue', ['value'=>$tutkimusalue]); ?>
                    
                    <?php foreach ($kyselyt as $kysely) :
                            echo  $this->Form->hidden('kysely', ['value'=>$kysely["b"]["id"]]);
                            echo  $this->Form->hidden('kyselynimi', ['value'=>$kysely["b"]["nimi"]]);
                            break;
                        endforeach;
                    ?>
                    
                    <?php foreach ($kyselyt as $kysely):
                       
                        $kyselyid = $kysely["b"]["id"];
                        $kyselynimi = $kysely["b"]["nimi"];
                        $kysymysnro = $kysely["c"]["kysymysnro"];
                        $kysymystyyppi = $kysely["c"]["kysymystyyppi_id"];
                        $otsikko = $kysely["c"]["kysymysotsikko"];
                        echo "<div class='form-group'>";
                        if ($kysymystyyppi == 1) {
                            echo $this->Form->hidden('kysymys-' . $kysymysnro, ['value'=> $otsikko]);
                            echo $this->Form->hidden('kysymystyyppi', ['value'=> $kysymystyyppi]);
                            echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko, ['class' => "label-bold"]);
                            echo $this->Form->control('vapaateksti-' . $kysymysnro, array (
                                'type' => 'textarea',
                                'label' => false,
                                'class' => 'label-bold',
                                
                            )); 
                            echo "</div>";
                        }
                        elseif ($kysymystyyppi == 2) {
                            echo $this->Form->hidden('kysymys-' . $kysymysnro, ['value'=> $otsikko]);
                            echo $this->Form->hidden('kysymystyyppi', ['value'=> $kysymystyyppi]);
                            echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko, ['class' => "label-bold"]);
                            $options = ['Kyllä' => 'Kyllä', 'Ei' => 'Ei'];
                            echo $this->Form->radio('kylla-ei-' . $kysymysnro, $options, []);
                            echo "</div>";
                        }
                        elseif ($kysymystyyppi == 3) {
                            echo $this->Form->hidden('kysymys-' . $kysymysnro, ['value'=> $otsikko]);
                            echo $this->Form->hidden('kysymystyyppi', ['value'=> $kysymystyyppi]);
                            echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko, ['class' => "label-bold"]);
                            echo $this->Form->radio('kalastusalueet', $kalastusalueet, []);
                            echo "</div>";
                            
                        }
                        elseif ($kysymystyyppi == 4) {
                            echo $this->Form->hidden('kysymys-' . $kysymysnro, ['value'=> $otsikko]);
                            echo $this->Form->hidden('kysymystyyppi', ['value'=> $kysymystyyppi]);
                            echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko, ['class' => "label-bold"]);
                            echo $this->Form->control($kysymysnro, array (
                                'type' => 'number',
                                'max' => 31,
                                'min' => 0,
                                'label' => "Tammikuu",
                                'name' => 'tammikuu',
                                
                            ));
                            
                            echo $this->Form->control($kysymysnro, array (
                                'type' => 'number',
                                'max' => 31,
                                'min' => 0,
                                'label' => "Helmikuu",
                                'name' => 'helmikuu',
                                
                            ));

                            echo $this->Form->control($kysymysnro, array (
                                'type' => 'number',
                                'max' => 31,
                                'min' => 0,
                                'label' => "Maaliskuu",
                                'name' => 'maaliskuu',
                                
                            ));

                            echo $this->Form->control($kysymysnro, array (
                                'type' => 'number',
                                'max' => 31,
                                'min' => 0,
                                'label' => "Huhtikuu",
                                'name' => 'huhtikuu',
                                
                            ));

                            echo $this->Form->control($kysymysnro, array (
                                'type' => 'number',
                                'max' => 31,
                                'min' => 0,
                                'label' => "Toukokuu",
                                'name' => 'toukokuu',
                                
                            ));

                            echo $this->Form->control($kysymysnro, array (
                                'type' => 'number',
                                'max' => 31,
                                'min' => 0,
                                'label' => "Kesäkuu",
                                'name' => 'kesäkuu',
                                
                            ));

                            echo $this->Form->control($kysymysnro, array (
                                'type' => 'number',
                                'max' => 31,
                                'min' => 0,
                                'label' => "Heinäkuu",
                                'name' => 'heinäkuu',
                                
                            ));

                            echo $this->Form->control($kysymysnro, array (
                                'type' => 'number',
                                'max' => 31,
                                'min' => 0,
                                'label' => "Elokuu",
                                'name' => 'elokuu',
                                
                            ));

                            echo $this->Form->control($kysymysnro, array (
                                'type' => 'number',
                                'max' => 31,
                                'min' => 0,
                                'label' => "Syyskuu",
                                'name' => 'syyskuu',
                                
                            ));

                            echo $this->Form->control($kysymysnro, array (
                                'type' => 'number',
                                'max' => 31,
                                'min' => 0,
                                'label' =>  "Lokakuu",
                                'name' => 'lokakuu',
                                
                            ));

                            echo $this->Form->control($kysymysnro, array (
                                'type' => 'number',
                                'max' => 31,
                                'min' => 0,
                                'label' => "Marraskuu",
                                'name' => 'marraskuu',
                                
                            ));

                            echo $this->Form->control($kysymysnro, array (
                                'type' => 'number',
                                'max' => 31,
                                'min' => 0,
                                'label' => "Joulukuu",
                                'name' => 'joulukuu',
                                
                            ));
                         
                            echo "</div>";
                            
                        }
                        elseif ($kysymystyyppi == 5) {
                            echo $this->Form->hidden('kysymys-' . $kysymysnro, ['value'=> $otsikko]);
                            echo $this->Form->hidden('kysymystyyppi', ['value'=> $kysymystyyppi]);
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

                            /*echo $this->Form->control('koentakerrat', array (
                                'label' => 'Koentakertojen lukumäärä',
                                'id' => 'tries-count'
                            ));

                            echo $this->Form->control('pyydystenmaara', array (
                                'label' => 'Pyydysten määrä',
                                'id' => 'resource-count'
                            ));
                            */
                            echo "<a id='add' class='btn btn-default'><i class='fa fa-plus' aria-hidden='true'></i></a></div>";
                            
                            echo "</div>";

                            echo "<div id='catch-table' class='table-responsive'>";
                                echo "<table class='table table-hover '>";
                                    echo "<thead>"
                                            . "<tr>"
                                                . "<th>Pyydys</th>"
                                                . "<th>Kala</th>"
                                                . "<th>Määrä (kg)</th>"
                                                . "<th></th>"
                                            . "</tr> "
                                        . "</thead>";
                                    echo "<tbody id='catch-row'>"
                                        . "</tbody>";                                    
                                echo "</table>";
                            echo "</div>";
                            
                            
                        }
                        elseif ($kysymystyyppi == 6) {
                            echo $this->Form->hidden('kysymys-' . $kysymysnro, ['value'=> $otsikko]);
                            echo $this->Form->hidden('kysymystyyppi', ['value'=> $kysymystyyppi]);
                            echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko, ['class' => "label-bold"]);
                            
                            echo $this->Form->input('', array (
                                'type' => 'select',
                                'id' => 'select-trap',
                                'label' => 'Valitse pyydys',
                                'empty' => 'Valitse',
                                'options' => $resurssit_pyydykset,
                            ));     
                            
                            echo $this->Form->control($kysymysnro, array (
                                'type' => 'number',
                                'id' => 'tries',
                                'max' => 31,
                                'min' => 0,
                                'label' => "Koentakertojen lukumäärä",
                                'name' => 'koentakerrat',
                                
                            ));

                            echo $this->Form->control($kysymysnro, array (
                                'type' => 'number',
                                'id' => 'trapcount',
                                'max' => 50,
                                'min' => 1,
                                'label' => "Pyydysten määrä per pyyntipäivä",
                                'name' => 'pyydysperpv',
                                
                            ));    
                            
                            echo "<a id='add-trap' class='btn btn-default'><i class='fa fa-plus' aria-hidden='true'></i></a></div>";
                            
                            echo "<div id='trap-table' class='table-responsive'>";
                                echo "<table class='table table-hover '>";
                                    echo "<thead>"
                                            . "<tr>"
                                                . "<th>Pyydys</th>"
                                                . "<th>Koentakerrat</th>"
                                                . "<th>Pyydysten määrä/päivä</th>"
                                                . "<th></th>"
                                            . "</tr> "
                                        . "</thead>";
                                    echo "<tbody id='trap-row'>"
                                        . "</tbody>";                                    
                                echo "</table>";
                            echo "</div>";                            
                            
                            echo "</div>";
                            
                        }
                        elseif ($kysymystyyppi == 7) {
                            echo $this->Form->hidden('kysymys-' . $kysymysnro, ['value'=> $otsikko]);
                            echo $this->Form->hidden('kysymystyyppi', ['value'=> $kysymystyyppi]);
                           echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko, ['class' => "label-bold"]);
                           echo "</div>";
                            
                        }
                        elseif ($kysymystyyppi == 8) {
                            echo $this->Form->hidden('kysymys-' . $kysymysnro, ['value'=> $otsikko]);
                            echo $this->Form->hidden('kysymystyyppi', ['value'=> $kysymystyyppi]);
                            echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko, ['class' => "label-bold"]);
                            $options = ['Haittaa merkittävästi' => 'Haittaa merkittävästi', 'Haittaa kohtalaisesti' => 'Haittaa kohtalaisesti', 'Ei haittaa' => 'Ei haittaa'];
                            foreach ($resurssit_haittatekijat as $tekija) :
                                echo $this->Form->label($kysymysnro, $tekija, ['style' => 'font-weight: 500;']);
                                echo $this->Form->radio($tekija . "-" . $kysymysnro, $options, []);
                            endforeach;
                            echo "</div>";
                            
                        }
                        elseif ($kysymystyyppi == 9) {
                            echo $this->Form->hidden('kysymys-' . $kysymysnro, ['value'=> $otsikko]);
                            echo $this->Form->hidden('kysymystyyppi', ['value'=> $kysymystyyppi]);
                            echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko, ['class' => "label-bold"]);
                            echo "<br>";
                            foreach ($resurssit_kalat as $kala) :
                                echo $this->Form->label($kysymysnro, $kala, ['style' => 'font-weight: 500;']);
                                $options = ['Yleistynyt' => 'Yleistynyt', 'Vähentynyt' => 'Vähentynyt', 'Ei muutosta' => 'Ei muutosta'];
                                echo $this->Form->radio($kala . "-" . $kysymysnro, $options, []);
                            endforeach;
                            echo "</div>";
                            
                        }
                        elseif ($kysymystyyppi == 10) {
                            echo $this->Form->hidden('kysymys-' . $kysymysnro, ['value'=> $otsikko]);
                            echo $this->Form->hidden('kysymystyyppi', ['value'=> $kysymystyyppi]);
                            echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko, ['class' => "label-bold"]);
                            $options = ['Merkittävä' => 'Merkittävä', 'Kohtalainen' => 'Kohtalainen', 'Ei merkitystä' => 'Ei merkitystä', 'Ei tietoa' => 'Ei tietoa'];
                            echo $this->Form->radio('arvio', $options, []);
                            echo $this->Form->control('lisatietoja-' . $kysymysnro, array (
                                'type' => 'textarea',   
                                'label' => 'Lisätietoja',
                            ));                             
                            echo "</div>";
                            
                        }
  

                    endforeach; ?>

                    <?= $this->Form->button('Lähetä', array('class' => 'btn btn-default', 'id' => 'sendform')) ?>
                    <?= $this->Form->end() ?> 
                </div>
            </div>
            <div class="col-md-2">
                
            </div>
        </div>    
    </div>
</div>

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
                        $kysymysid = $kysely["c"]["id"];
                        $kysymysnro = $kysely["c"]["kysymysnro"];
                        $kysymystyyppi = $kysely["c"]["kysymystyyppi_id"];
                        $otsikko = $kysely["c"]["kysymysotsikko"];
                        echo "<div class='form-group'>";
                        if ($kysymystyyppi == 1) {
                            echo $this->Form->hidden('kysymys[]', ['value'=> $otsikko . '@' . $kysymystyyppi . '@' . $kysymysid]);
                            echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko, ['class' => "label-bold"]);
                            echo $this->Form->control('vastaus[' . $kysymysid. ']', array (
                                'type' => 'textarea',
                                'label' => false,
                                'class' => 'label-bold',
                                
                            )); 
                            echo "</div>";
                        }
                        elseif ($kysymystyyppi == 2) {
                            echo $this->Form->hidden('kysymys[]', ['value'=> $otsikko . '@' . $kysymystyyppi . '@' . $kysymysid]);
                            echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko, ['class' => "label-bold"]);
                            $options = ['Kyllä' => 'Kyllä', 'Ei' => 'Ei'];
                            echo $this->Form->radio('vastaus[' . $kysymysid . ']', $options, []);
                            echo "</div>";
                        }
                        elseif ($kysymystyyppi == 3) {
                            echo $this->Form->hidden('kysymys[]', ['value'=> $otsikko . '@' . $kysymystyyppi . '@' . $kysymysid]);
                            echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko, ['class' => "label-bold"]);
                            echo $this->Form->radio('vastaus[' . $kysymysid . ']', $kalastusalueet, []);
                            echo "</div>";
                            
                        }
                        elseif ($kysymystyyppi == 4) {
                            echo $this->Form->hidden('kysymys[]', ['value'=> $otsikko . '@' . $kysymystyyppi . '@' . $kysymysid]);
                            echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko, ['class' => "label-bold"]);
                            echo $this->Form->control('vastaus[' . $kysymysid. ']', array (
                                'type' => 'number',
                                'max' => 31,
                                'min' => 0,
                                'label' => "Tammikuu"
                            ));
                            
                            echo $this->Form->control('vastaus[' . $kysymysid. ']', array (
                                'type' => 'number',
                                'max' => 31,
                                'min' => 0,
                                'label' => "Helmikuu"
                                
                            ));

                            echo $this->Form->control('vastaus[' . $kysymysid. ']', array (
                                'type' => 'number',
                                'max' => 31,
                                'min' => 0,
                                'label' => "Maaliskuu"
                                
                            ));

                            echo $this->Form->control('vastaus[' . $kysymysid. ']', array (
                                'type' => 'number',
                                'max' => 31,
                                'min' => 0,
                                'label' => "Huhtikuu"
                                
                            ));

                            echo $this->Form->control('vastaus[' . $kysymysid. ']', array (
                                'type' => 'number',
                                'max' => 31,
                                'min' => 0,
                                'label' => "Toukokuu"
                                
                            ));

                            echo $this->Form->control('vastaus[' . $kysymysid. ']', array (
                                'type' => 'number',
                                'max' => 31,
                                'min' => 0,
                                'label' => "Kesäkuu"
                                
                            ));

                            echo $this->Form->control('vastaus[' . $kysymysid. ']', array (
                                'type' => 'number',
                                'max' => 31,
                                'min' => 0,
                                'label' => "Heinäkuu"
                                
                            ));

                            echo $this->Form->control('vastaus[' . $kysymysid. ']', array (
                                'type' => 'number',
                                'max' => 31,
                                'min' => 0,
                                'label' => "Elokuu"
                                
                            ));

                            echo $this->Form->control('vastaus[' . $kysymysid. ']', array (
                                'type' => 'number',
                                'max' => 31,
                                'min' => 0,
                                'label' => "Syyskuu"
                                
                            ));

                            echo $this->Form->control('vastaus[' . $kysymysid. ']', array (
                                'type' => 'number',
                                'max' => 31,
                                'min' => 0,
                                'label' =>  "Lokakuu"
                                
                            ));

                            echo $this->Form->control('vastaus[' . $kysymysid. ']', array (
                                'type' => 'number',
                                'max' => 31,
                                'min' => 0,
                                'label' => "Marraskuu"                                
                            ));

                            echo $this->Form->control('vastaus[' . $kysymysid. ']', array (
                                'type' => 'number',
                                'max' => 31,
                                'min' => 0,
                                'label' => "Joulukuu"
                                
                            ));
                         
                            echo "</div>";
                            
                        }
                        elseif ($kysymystyyppi == 5) {
                            echo $this->Form->hidden('kysymys[]', ['value'=> $otsikko . '@' . $kysymystyyppi . '@' . $kysymysid]);
                            echo $this->Form->hidden('', ['value'=> $kysymysid, 'id' => 'kysymysid']);
                            echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko, ['class' => "label-bold"]);
                            
                            echo $this->Form->input('', array (
                                'type' => 'select',
                                'id' => 'select-pyydys',
                                'label' => 'Valitse pyydys',
                                'empty' => 'Valitse',
                                'options' => $resurssit_pyydykset,
                            ));
                            
                            echo '<div id="select-kala" class="hidden">';
                            echo $this->Form->input('', array (
                                'type' => 'select',
                                'label' => 'Valitse kala',
                                'empty' => 'Valitse',
                                'options' => $resurssit_kalat,
                            ));              
                            echo "</div>";
                            
                            echo '<div id="detail-count" class="hidden">';
                            echo $this->Form->control('', array (
                                'label' => 'Määrä (kg)',
                                'id' => 'kalakg'
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
                            
                        ?>
                            <a id='add' class='btn btn-default'><i class='fa fa-plus' aria-hidden='true'></i></a></div>
                            
                            </div>
                        
                            <div class='table-responsive'>
                                <table class='table table-hover '>
                                        <thead>
                                            <tr>
                                            <th>Pyydys</th>
                                            <th>Kala</th>
                                            <th>Määrä (kg)</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody id='catch-table'>
                                        </tbody>                                  
                                </table>
                            </div>
                        <?php 
                            
                        }
                        elseif ($kysymystyyppi == 6) {
                            echo $this->Form->hidden('kysymys[]', ['value'=> $otsikko . '@' . $kysymystyyppi . '@' . $kysymysid]);
                            echo $this->Form->hidden('', ['value'=> $kysymysid, 'id' => 'kysymysid-type-6']);
                            echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko, ['class' => "label-bold"]);
                            
                            echo $this->Form->input('', array (
                                'type' => 'select',
                                'id' => 'select-trap',
                                'label' => 'Valitse pyydys',
                                'empty' => 'Valitse',
                                'options' => $resurssit_pyydykset,
                            ));   

                            echo $this->Form->control('', array (
                                'type' => 'number',
                                'id' => 'tries',
                                'max' => 31,
                                'min' => 0,
                                'label' => "Koentakertojen lukumäärä"
                                
                            ));

                            echo $this->Form->control('', array (
                                'type' => 'number',
                                'id' => 'trapcount',
                                'max' => 50,
                                'min' => 1,
                                'label' => "Pyydysten määrä per pyyntipäivä"
                                
                            ));    
                            ?>

                            <a id='add-trap' class='btn btn-default'><i class='fa fa-plus' aria-hidden='true'></i></a></div>
                            
                            <div id='trap-table' class='table-responsive'>
                                <table class='table table-hover '>
                                    <thead>
                                        <tr>
                                            <th>Pyydys</th>
                                            <th>Koentakerrat</th>
                                            <th>Pyydysten määrä/päivä</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id='trap-row'></tbody>                                  
                                </table>
                            </div>

                            <?php
                            
                        }
                        elseif ($kysymystyyppi == 7) {
                            echo $this->Form->hidden('kysymys[]', ['value'=> $otsikko . '@' . $kysymystyyppi . '@' . $kysymysid]);
                           echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko, ['class' => "label-bold"]);
                           echo "</div>";
                            
                        }
                        elseif ($kysymystyyppi == 8) {
                            echo $this->Form->hidden('kysymys[]', ['value'=> $otsikko . '@' . $kysymystyyppi . '@' . $kysymysid]);
                            echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko, ['class' => "label-bold"]);
                            echo "<br>";
                            foreach ($resurssit_kalat as $id => $kala) :
                                echo $this->Form->label($kysymysnro, $kala, ['style' => 'font-weight: 500;']);
                                $options = ['Yleistynyt' => 'Yleistynyt', 'Vähentynyt' => 'Vähentynyt', 'Ei muutosta' => 'Ei muutosta'];
                                echo $this->Form->radio('vastaus[' . $kysymysid . "][" . $id . ']', $options, []);
                            endforeach;
                            echo "</div>";                            
                        }
                        elseif ($kysymystyyppi == 9) {
                            echo $this->Form->hidden('kysymys[]', ['value'=> $otsikko . '@' . $kysymystyyppi . '@' . $kysymysid]);
                            echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko, ['class' => "label-bold"]);
                            $options = ['Haittaa merkittävästi' => 'Haittaa merkittävästi', 'Haittaa kohtalaisesti' => 'Haittaa kohtalaisesti', 'Ei haittaa' => 'Ei haittaa'];
                            $array_index = 0;
                            foreach ($resurssit_haittatekijat as $tekija => $index) :
                                echo $this->Form->label($kysymysnro, $index, ['style' => 'font-weight: 500;']);
                                echo $this->Form->radio('vastaus[' . $kysymysid . ']' . '[' . $array_index . ']' . '[' . $tekija . ']', $options, []);
                                $array_index++;
                            endforeach;
                            echo "</div>";                            
                            
                        }
                        elseif ($kysymystyyppi == 10) {
                            $index = 0;
                            echo $this->Form->hidden('kysymys[]', ['value'=> $otsikko . '@' . $kysymystyyppi . '@' . $kysymysid]);
                            echo $this->Form->label($kysymysnro, $kysymysnro . ". " . $otsikko, ['class' => "label-bold"]);
                            $options = ['Merkittävä' => 'Merkittävä', 'Kohtalainen' => 'Kohtalainen', 'Ei merkitystä' => 'Ei merkitystä', 'Ei tietoa' => 'Ei tietoa'];
                            echo $this->Form->radio('vastaus[' . $kysymysid . '][' . $index . ']', $options, []);
                            $index++;
                            echo $this->Form->control('vastaus[' . $kysymysid . '][' . $index . ']', array (
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

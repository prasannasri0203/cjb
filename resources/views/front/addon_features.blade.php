 <?php $i=0;?>

@if(@$print_type_value != 'N;')
                        @foreach($print_type as $type)
                            <?php
                            $array = unserialize(@$print_type_value);
                            $price = unserialize(@$print_price_value);
                          $approved_type = unserialize(@$approved_additional_type);
                          if($array){
                          if (in_array($type->id, $array))
                              {
                            ?>
                            <input type="checkbox" id="print_type_array<?php echo $i?>" class="print_type_array addon" data-id="<?php echo $price[$i] ?>" name="print_type_array"
                             value="{{$type->id}}" <?php if(@$approved_additional_type){
                              if(in_array($type->id, $approved_type)){echo "checked";}} ?>>{{$type->print_type_name}}

                             <?php
                              }
                            }
                            ?>
                             <?php
                             if($array){
                          if (in_array($type->id, $array))
                            {
                          $i++;
                            }
                        }
                        ?>
                        @endforeach
                         @endif
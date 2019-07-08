<?php
$config = array('empleados' => array(array(
                                	'field'=>'nombre',
                                	'label'=>'nombres',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'dni',
                                	'label'=>'DNI',
                                	'rules'=>'required|trim|xss_clean'
                                ,
								array(
                                	'field'=>'estado',
                                	'label'=>'Estado',
                                	'rules'=>'required|trim|xss_clean'
                                )
                ),
                'usuarios' => array(array(
                                    'field'=>'nombre',
                                    'label'=>'Nombre',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'password',
                                    'label'=>'Password',
                                    'rules'=>'required|trim|xss_clean'
                                )
                    )
));
			   
<?php
/**
 * Test fixture for PartCategories table.
 * User: wangchj
 * Date: 6/26/13
 * Time: 4:51 PM
 */


//partCatId,name,description,parent,isGroup
return array(
    array('partCatId'=>10,'name'=>'Chambers','description'=>'Root category for chambers','parent'=>NULL,'isGroup'=>1),
    array('partCatId'=>20,'name'=>'MDPX_flanges','description'=>'Root category for flanges','parent'=>NULL,'isGroup'=>1),
    array('partCatId'=>25,'name'=>'Electrodes','description'=>'Root category for electrodes','parent'=>NULL,'isGroup'=>1),
    array('partCatId'=>30,'name'=>'SingleLP','description'=>'','parent'=>NULL,'isGroup'=>1),
    array('partCatId'=>31,'name'=>'DoubleLP','description'=>NULL,'parent'=>NULL,'isGroup'=>1),
    array('partCatId'=>40,'name'=>'Camera','description'=>'Root category for cameras','parent'=>NULL,'isGroup'=>1),
    array('partCatId'=>45,'name'=>'CameraLens','description'=>NULL,'parent'=>NULL,'isGroup'=>1),
    array('partCatId'=>46,'name'=>'CameraFilters','description'=>NULL,'parent'=>NULL,'isGroup'=>1),
    array('partCatId'=>60,'name'=>'Pressure','description'=>NULL,'parent'=>NULL,'isGroup'=>1),
    array('partCatId'=>61,'name'=>'Rfpower','description'=>'','parent'=>NULL,'isGroup'=>1),
    array('partCatId'=>62,'name'=>'Dcpower','description'=>NULL,'parent'=>NULL,'isGroup'=>1),
    array('partCatId'=>63,'name'=>'Particles','description'=>NULL,'parent'=>NULL,'isGroup'=>1),
    array('partCatId'=>64,'name'=>'Gas','description'=>'Root category for gases','parent'=>NULL,'isGroup'=>1),
    array('partCatId'=>70,'name'=>'Magnets','description'=>'Root category for magnets','parent'=>NULL,'isGroup'=>1),
    array('partCatId'=>201,'name'=>'MDPX_side_flange','description'=>'','parent'=>20,'isGroup'=>1),
    array('partCatId'=>202,'name'=>'MDPX_top-bot_flange','description'=>NULL,'parent'=>20,'isGroup'=>1),
    array('partCatId'=>251,'name'=>'Top Electrode','description'=>'Category for top electrodes','parent'=>25,'isGroup'=>1),
    array('partCatId'=>252,'name'=>'Bottom Electrode','description'=>'Category for bottom electrodes','parent'=>25,'isGroup'=>1),
    array('partCatId'=>301,'name'=>'mdpx_lp1','description'=>'Single tip Langmuir probe (1 mm dia x 2 mm long) - TEST','parent'=>30,'isGroup'=>0),
    array('partCatId'=>401,'name'=>'mdpx_cam1','description'=>'Fastec 500 fps, b/w, camera - TEST','parent'=>40,'isGroup'=>0),
    array('partCatId'=>701,'name'=>'mdpx_magnet1','description'=>'MDPX magnet #1 - upper cryostat','parent'=>70,'isGroup'=>0),
    array('partCatId'=>702,'name'=>'mdpx_magnet2','description'=>'MDPX magnet #2 - lower cryostat','parent'=>70,'isGroup'=>0),
    array('partCatId'=>1001,'name'=>'Octagon 1','description'=>'Octagon 1','parent'=>10,'isGroup'=>0),
    array('partCatId'=>2011,'name'=>'mdpx_side_window','description'=>'MDPX 6in x 6.87in x 0.5in polycarbonate window','parent'=>201,'isGroup'=>0),
    array('partCatId'=>2012,'name'=>'mdpx_side_qf25','description'=>'MDPX 6in x 6.87 x 0.5in, qf25 adaptor plate - midplane','parent'=>201,'isGroup'=>0),
    array('partCatId'=>2013,'name'=>'mdpx_side_qf40','description'=>'MDPX 6in x 6.87 x 0.5in, qf40 adaptor plate - midplane','parent'=>201,'isGroup'=>0),
    array('partCatId'=>2014,'name'=>'mdpx_side_blank','description'=>'MDPX 6in x 6.87 x 0.5in, blank','parent'=>201,'isGroup'=>0),
    array('partCatId'=>2511,'name'=>'electrode_up_solid1','description'=>'Top electrode, solid #1 - TEST','parent'=>251,'isGroup'=>0),
    array('partCatId'=>2512,'name'=>'electrode_up_clear1','description'=>'Top electrode, clear #1 - TEST','parent'=>251,'isGroup'=>0),
    array('partCatId'=>2521,'name'=>'electrode_bot_solid1','description'=>'Bottom electrode, solid #1 - TEST','parent'=>252,'isGroup'=>0),
    array('partCatId'=>2522,'name'=>'electrode_bot_clear1','description'=>'Bottom electrode, clear #1 - TEST','parent'=>252,'isGroup'=>0),
);
?>
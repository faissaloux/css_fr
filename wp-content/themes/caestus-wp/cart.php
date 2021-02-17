<?php
/*
    Template Name: cart
*/

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('includes/head.php') ?>
</head>
<a href="" id="button"></a>

<body>
    <?php require_once('includes/nav.php') ?>
    <section class="section cart-section">
        <div class="container">
        <form action="#" id="checkoutForm" class="cart-form" method="POST">
		   
        <h2 class="text-center cart-title"><?php echo get_the_title(); ?></h2>
				<div class="">
                       
                             <div class="alert alert-danger checkoutjs" style="display:none;">
                                 
                             </div>
                              
                            <div class="form-group col-md-12 row px-0 mx-0">
                                <label for="first_name" class="col-md-6 px-0">Nom de demandeur *</label>
                                <input type="text" id="first_name" placeholder="Nom de demandeur" value="" name="first_name" class="form-control col-md-6 required_field" required="">
                            </div>
        
                            <div class="form-group col-md-12 row px-0 mx-0">
                                <label for="project_name" class="col-md-6 px-0">Nom du Projet *</label>
                                <input type="text" id="project_name" placeholder="Nom du Projet" value="" name="project_name" class="form-control col-md-6   required_field" required="">
                            </div>  
                            
                            <div class="form-group col-md-12 row px-0 mx-0">
                                <label for="phone" class="col-md-6 px-0">Telephone  *</label>
                                <input type="number" id="phone" placeholder="Telephone" value="" name="Telephone" class="form-control col-md-6  required_field" required="">
                            </div>
                            
                            
                            <div class="form-group col-md-12 row px-0 mx-0">
                                <label for="Email" class="col-md-6 px-0"> Email *</label>
                                <input type="text" id="Email" placeholder="Email" value="" name="Email" class="form-control col-md-6  required_field" required="">
                            </div>
                            
                            <div class="form-group col-md-12 row px-0 mx-0">
                                 <label for="dates" class="col-md-6 px-0">Dates  *</label>
            
                                <div class="form-group col-md-6 mb-0" style="padding-right: 7px;">
                               <div class="row">
                                <div class="col-md-6 mb-sm px-0 mx-0">
                                    <div class="form-group">
                                        <label for="from" class="from"> Du </label>
                                        <input type="text" readonly="true" placeholder="" class="form-control" name="from" id="firstDate">
                                    </div>
                                </div>
                              
                                <div class="col-md-6 mb-sm px-0 mx-0">
                                    <label for="to" class="to"> au </label>
                                    <input type="text" readonly="true" placeholder="" class="form-control" name="to" id="secondDate">
                                  </div>       
                                  </div> 
                                  
                                </div> 
                            </div>
                         
                            <div class="form-group col-md-12 row px-0 mx-0">
                              <label for="shoting_days" class="col-md-6 px-0"> Jours de tournage </label>
                              <input type="number" class="form-control col-md-6 " placeholder="Jours de tournage" min="1" max="400" name="shoting_days" id="restDays" >
                            </div>
                            <?php foreach($cart_items as $key => $item): ?>
                                <table class="table table-cart">
                                    <thead>
                                        <tr>
                                            <th colspan="3" class="title"><?php echo $key; ?></th>
                                        </tr>
                                    </thead>
                                    <tbody valign="middle">
                                        <?php foreach($item as $itm): ?>
                                            <tr>
                                                <td>
                                                    <a class="item-remove remove-from-cart" data-id="<?php echo $itm['id']; ?>" data-category="<?php echo $itm['category']; ?>"><i class="ti-close"></i></a>
                                                </td>
                                                <td class="d-flex align-items-center">
                                                    <div>
                                                        <img class="rounded" src="<?php echo $itm['image']; ?>">
                                                    </div>
                                                    <div>
                                                        <?php echo $itm['title']; ?>
                                                    </div>
                                                </td>
                                                <td class="text-left">
                                                    <input type="number" min="1" max="20" id="dldklklll" class="quantityPicker product_quantity form-control" data-id="<?php echo $itm['id']; ?>" data-category="<?php echo $itm['category']; ?>" data-cartitem="7" value="<?php echo $itm['quantity']; ?>">
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>       
                                    </tbody>
                                </table>
                            <?php endforeach; ?>
                         
                         <div class="form-group col-md-12 row px-0 mx-0">
                                <label for="notes" class="col-md-6 px-0"> Commentaires  </label>
                                <textarea class="form-control col-md-6" id="notes" placeholder="Commentaires" name="notes" cols="30" rows="10"></textarea>
                            </div>
                       
                    </div>
                
                <div class="form-group col-md-12 pl-0">
                    <input type="submit" value="Demande de devis" class="btn-send make_order">
                </div>		

        </form> 
        </div>
      </section>
    <?php require_once('includes/footer.php') ?>
    <?php require_once('includes/scripts.php') ?>
</body>

</html>
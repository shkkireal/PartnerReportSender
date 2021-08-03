<?php
$user_id = $modx->getLoginUserID();
$id = $modx->documentIdentifier;
$page_id = $modx->getPageInfo($id);
$page_title = $page_id["pagetitle"];

if($user_id){
$userInfo = $modx->db->getRow(
    $modx->db->select(
        "*", 
        $modx->getFullTableName('web_user_attributes'), 
        "`internalKey`=".$modx->getLoginUserID()
    )
);

          $id = $modx->documentIdentifier;
	    $page_id = $modx->getPageInfo($id);
	
		$epb_nomber = $modx->getLoginUserName();

        $val = $modx->getTemplateVarOutput(array('email'));
        $email_partner = $val[email];
         


$page_id = $modx->getPageInfo($id);

$tmpl = '

<button class="w-100 btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Подать заявку партнеру</button>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Заявка партнеру для формирования скидки</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
	
     <form class="p-4 p-md-5 border rounded-3 bg-light" id="PartnerLid">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="name" name="name" value="'.$userInfo[fullname].'" placeholder="* Фамилия, имя, отчество" required>
            <label for="name">* Фамилия, имя, отчество</label>
          </div>
		  		  <div class="form-floating mb-3">
            <input type="email" class="form-control" id="email" name="email" value="'.$userInfo[email].'" placeholder="* Ваш email" required>
            <label for="email">* Еmail</label>
          </div>
		  <div class="form-floating mb-3">
            <input type="text" class="form-control" id="epb" name="epb" value="'.$epb_nomber.'" placeholder="* номер электронного профсоюзного билета" required>
            <label for="epb">* номер электронного профсоюзного билета</label>
          </div>
		  <div class="form-floating mb-3">
            <input type="text" class="form-control" id="telefon" name="telefon" value="'.$userInfo[mobilephone].'" placeholder="* Номер мобильного телефона" required>
            <label for="telefon">* Номер мобильного телефона</label>
          </div>
		    <div class="checkbox mb-3">
            <label>
              <input type="checkbox" id="accept"  required  > *Согласен отправить свои данные партнеру
			<input type="hidden" id="email_partner" name="email_partner" value="'.$email_partner.'" >
			<input type="hidden" id="user_id" name="user_id" value="'.$user_id.'" >
			<input type="hidden" id="partner_name" name="partner_name" value="[*pagetitle*]" >
			
            </label>
          </div>
		
		

		  <button class="w-100 btn btn-lg btn-primary" id="send">Отправить заявку</button>
          <hr class="my-4">
          <small class="text-muted">* Поля обязательные для заполнения</small>
        </form>
	 
		</div>
      </div>
	   
	   
	   
	   
	   
      </div>
      <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
      </div>
    </div>
<script src="js/formPartnerSender.js"></script>

';
echo $tmpl;	
	
}
else{
echo '{{form_partner_email_sender}}';
}
?>
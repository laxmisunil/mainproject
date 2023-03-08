<style>
/* If you like this, be sure to ❤️ it. */
.wrapper {
  height: 100vh;
  /* This part is important for centering the content */
  display: flex;
  align-items: center;
  justify-content: center;
  /* End center */
  background: -webkit-linear-gradient(to right, #834d9b, #d04ed6);
  background: linear-gradient(to right, #834d9b, #d04ed6);
}

.wrapper a {
  display: inline-block;
  text-decoration: none;
  padding: 15px;
  background-color: #fff;
  border-radius: 3px;
  text-transform: uppercase;
  color: #585858;
  font-family: 'Roboto', sans-serif;
}

.modal {
  visibility: hidden;
  opacity: 0;
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  background: rgba(77, 77, 77, .7);
  transition: all .4s;
}

.modal:target {
  visibility: visible;
  opacity: 1;
}

.modal__content {
  border-radius: 4px;
  position: relative;
  width: 500px;
  max-width: 90%;
  background: #fff;
  padding: 1em 2em;
}

.modal__footer {
  text-align: right;
  a {
    color: #585858;
  }
  i {
    color: #d02d2c;
  }
}
.modal__close {
  position: absolute;
  top: 10px;
  right: 10px;
  color: #585858;
  text-decoration: none;
}

</style>
<div class="wrapper">
    <a href="#demo-modal">Open Demo Modal</a>
</div>

<div id="demo-modal" class="modal">
    <div class="modal__content">
        <h1>CSS Only Modal</h1>

        <p>
            You can use the :target pseudo-class to create a modals with Zero JavaScript. Enjoy!
        </p>

      

        <a href="#" class="modal__close">&times;</a>
    </div>
</div>
$sel="SELECT tbl2.*,tbl1.*,tbl3.* FROM tbl_vaccinebooked AS tbl2 INNER JOIN tbl_pet AS tbl1 ON tbl2.petID=tbl1.petID INNER JOIN tbl_userdetails AS tbl3 ON tbl3.userID=tbl1.customerID WHERE vaccineDate>='$date'";
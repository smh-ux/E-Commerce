<?php
if (!$_SESSION['loggedinVendor']) {
	header('Location: index.php?page=login');
	exit;
}

?>

<?=template_header('You Can Manage Your Vendor Page Here');?>

<div class="product content-wrapper">
    
    <div>
        <form action="index.php?page=productadding" method="post">
            <table>
                <tr>
                    <td>                
                        <input type="file" id="fileInput" name="file" accept="image/*" style="display:none;">
                        <img src="imgs/non-image.png" id="clickableImage" alt="ClickableImage" style="cursor:pointer;" width="500" height="500">
                        <img id="selectedImage" alt="">
                    </td>
                    <td>
                        <label style="margin-left:50px;margin-bottom: 5px;">Name: </label><br><input type="text" name="name" placeholder="Name" style="width: 400px;padding: 10px;margin-left:50px;margin-bottom: 15px;border: 1px solid #ccc;color: #555555;border-radius: 5px;" required/><br>
                        <label style="margin-left:50px;margin-bottom: 5px;">Title: </label><br><input type="text" name="title" placeholder="Title" style="width: 400px;padding: 10px;margin-left:50px;margin-bottom: 15px;border: 1px solid #ccc;color: #555555;border-radius: 5px;" required/><br>                        
                        <label style="margin-left:50px;margin-bottom: 5px;">Describe: </label><br><textarea rows="10" cols="50" name="describe" placeholder="Describe Shortly" style="width: 400px;padding: 10px;margin-left:50px;margin-bottom: 15px;border: 1px solid #ccc;color: #555555;border-radius: 5px;" required></textarea><br>          
                        <label style="margin-left:50px;margin-bottom: 5px;">Price: </label><br><input type="float" name="price" placeholder="11.11" required style="width: 400px;padding: 10px;margin-left:50px;margin-bottom: 15px;border: 1px solid #ccc;color: #555555;border-radius: 5px;" required/><br>
                        <label style="margin-left:50px;margin-bottom: 5px;">Quantity: </label><br><input type="number" name="quantity" value="1" min="1" placeholder="Quantity" required style="margin-left:50px;"><br>
                        <label style="margin-left:50px;margin-bottom: 5px;">Choose a browser from this list:</label>
                        <input list="categories" name="category" placeholder="Choose a category" style="width: 400px;padding: 10px;margin-left:50px;margin-bottom: 15px;border: 1px solid #ccc;color: #555555;border-radius: 5px;" required/>
                        <datalist id="categories">
                            <option value="Technology">
                            <option value="Fashion">
                        </datalist>
                        <input type="submit" value="Ekle" style="margin-left:50px;">
                    </td>
                </tr>
            </table>
        </form>

        <script>
            document.getElementById("clickableImage").addEventListener("click", function() {
                document.getElementById("fileInput").click();
            });

            document.getElementById("fileInput").addEventListener("change", function(e) {
                var file = e.target.files[0];
                var reader = new FileReader();

                reader.onloadend = function() {
                    document.getElementById("selectedImage").src = reader.result;
                }

                if (file) {
                    reader.readAsDataURL(file);
                    document.getElementById("clickableImage").style = "display:none;";
                    document.getElementById("selectedImage").style = "width:500;height:500px;";
                } else {
                    document.getElementById("selectedImage").src = "";
                }
            });
        </script>
    </div>
    
    
</div>

<?=template_footer()?>

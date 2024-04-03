// JavaScript Document
function kiemtradl()
{
	if(document.form1.txtuser.value.length == 0) 
	{
		window.alert(" Bạn phải nhập user ");
		return false;
	}
	if(document.form1.txtpass.value.length == 0)
	{
		window.alert(" Bạn chưa điền mật khẩu ");
		return false;
	}
	if(document.form1.txtuser.value.length < 4 )
	{
		window.alert(" Tên đăng nhập quá ngắn ");
		return false;
	}
	if(document.form1.txtpass.value.length < 4)
	{
		window.alert(" Mật khẩu quá ngắn ");
		return false;
	}
	return true;	
	
}
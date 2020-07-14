function getDataById(id)
{
	for (var i=0; i < data.length; i++) {
        if (data[i].id == id) {
            return data[i];
        }
    }
}

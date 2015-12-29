import React from 'react';

export class GalleryForm extends React.Component {

	handleSubmit = (e) => {
		e.preventDefault();
		let files = React.findDOMNode(this.refs.files);
		let id = location.pathname.match(/\/([0-9]+)/)[1];
		for (let i = 0; i < files.files.length; i++) {
			let data = new FormData();
			data.append('pictures', files.files[i]);
			var send;

		$.ajax({
			url: `/home/${id}/pridat-fotky`,
			method: 'POST',
			data: data,
			processData: false,
  			contentType: false,
			success: (data) => {
				send = data;
				this.props.onNewPicture(send);
			}
			
		});	
		}
	}
	render = () => {
		return (
			<div className="row">
				<h2>Přidat fotku</h2>
				<form onSubmit={this.handleSubmit} >
	    	    	<label htmlFor="description" className="control-label">Fotky</label>
		    	    <input type="file" ref="files" name="files[]" accept="image/*" className="file-input" required multiple />
		    	    <div className="photos-size" > Velikost fotky musí být menší než 2MB. </div>
    		    	<button type="submit" className="btn btn-primary submit-btn" >Přidat fotky</button>
    	    	</form>
    	    </div>
		);
	}
}

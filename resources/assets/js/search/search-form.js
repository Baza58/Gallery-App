import React from 'react';

export class SearchForm extends React.Component {
	handleChange = () => {
		var filteredText = this.refs.input.value;
		this.props.onTextChange(filteredText);
	}
	render = () => {
		return (
			<div>
				<label htmlFor="search" className="search-label">Vyhledávání uživatelů</label>
				<input type="text" 
					   ref="input" 
					   onChange={this.handleChange} 
					   value={this.props.filteredText} 
					   id="search" 
					   placeholder="Jan Novák"
					   className="search-input form-control" />
			</div>
		);
	}
}
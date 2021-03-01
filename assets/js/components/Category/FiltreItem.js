function FiltreItem( propos ) {
    const { value, key } = propos;

    function handleClick( categoryId, categoryTitle ) {
        propos.setItemActive( categoryId );
        propos.setSelectedCategory( categoryId );
        propos.setSelectedCategoryTitle( categoryTitle );
        document.title = categoryTitle;
    }
    console.log( value );
    return (
        <>
            <li className="mx-16px position-relative">
                <input name="cat" id={`cat-${value}`} className="position-absolute top-0 bottom-0 left-0 right-0 w-100 h-100"
                    type="radio"
                    onChange={( ( ) => handleClick( key, value ) )}
                    value="all"/>
                <label htmlFor="cat-all"
                    className="py-4px px-8px fs-short-2 ff-semibold transition-color">{value}</label>
            </li>
        </>
    );
}

export default FiltreItem;

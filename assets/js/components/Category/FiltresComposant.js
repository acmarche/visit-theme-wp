import { fetchFiltres } from './service/categories-service';
import FiltreItem from './FiltreItem';
import FiltreItemOption from './FiltreItemOption';

const {
    useState,
    useEffect
} = wp.element;

function FiltresComposant( propos ) {
    const [ filtres, setFiltres ] = useState([]);

    async function loadFiltres() {
        let response;
        try {
            response = await fetchFiltres( propos.referenceHades );
            setFiltres( response.data );
            console.log( response.data );
            console.log( filtres );
        } catch ( e ) {
        }
        return null;
    }

    useEffect( () => {
        if ( 0 < propos.referenceHades.length ) { loadFiltres(); }
    }, [ propos.referenceHades ]);

    const listItems = Object.keys( filtres ).map( ( object, key ) => (
        <FiltreItem
            item={filtres[key]}
            key={object}
        />
    ) );

    const listOptions = Object.arr( filtres ).map( ( object, key ) => (
        <FiltreItemOption
            item={filtres[key]}
            key={object}
        />
    ) );

    return (
        <>
            <div className="d-md-none pr-12px border border-primary rounded-xs position-relative">
                <i className="fas fa-angle-down position-absolute top-0 bottom-0 right-0 mr-16px fs-big-1 text-primary py-5px"></i>
                <select name="categories" id="cat-select" className="fs-short-3 ff-semibold rounded-xs">
                    {listOptions}
                </select>
            </div>
            <ul className="cat-filters d-md-flex mw-448px flex-wrap justify-content-center align-items-center d-none">
                {listItems}
            </ul>
        </>
    );
}

export default FiltresComposant;

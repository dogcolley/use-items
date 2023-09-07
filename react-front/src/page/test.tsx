import TestCompoment from '../component/testComponent'
import { useParams } from 'react-router-dom';

function test() {
    const { page } = useParams();
    return(
        <>
            <div>test {page}</div>
            <TestCompoment />
        </>

    )
}

export default test
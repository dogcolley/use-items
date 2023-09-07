import { useState,useEffect  } from "react"
import { useRecoilState } from "recoil"
import {test} from '../atom'
import style from '../styles/test.module.scss'

function TestCompoment(){
    const [title, setTitle]  = useState<string>('텍스트')
    const [pw,setPw] = useState<string>('')
    useEffect (()=>{
        console.log('use Effect Test')
    },[])

    console.log(style)

    const   [t,setT]  = useRecoilState(test);

    function recoilChage(){
        setT({
            ...t,
            pwd:pw
        })
    }

    return(
        <>
            <div>
                {title}
                <button onClick={()=>{setTitle(title == '텍스트' ? '변경 텍스트' : '텍스트')}}> 
                    <br/>
                    타이틀 바꾸기
                </button>
            </div>
            <div>
                {t.id} <br/>
                {t.pwd} <br/>
                chage : pw <input type="text" className={style.input_box} value={pw} onChange={(e)=>{setPw(e.target.value)}} /><br/>
                <button type="button" onClick={recoilChage}>바꾸기</button>
            </div>
        </>
    )
}

export default TestCompoment
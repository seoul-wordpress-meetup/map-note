import NaverMap from './NaverMap.tsx'
import {useEffect} from 'react'

const Main = () => {
    useEffect(() => {
        fetch('https://wordpress.localhost:8443/wp-json/wp/v2/map_note_place');
    }, [])

    return (
        <div className="w-screen h-screen relative">
            <NaverMap id="main-naver-map"/>
            <div className="fixed top-0 right-0 z-10000">
                <input type="text" className="input max-w-sm" aria-label="input"/>
            </div>
        </div>
    )
}

export default Main

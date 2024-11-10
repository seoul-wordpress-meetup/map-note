import { useEffect } from 'react';
import { IStaticMethods } from 'flyonui/flyonui';
import './App.css'

declare global {
    interface Window {
        HSStaticMethods: IStaticMethods;
    }
}

function App() {
    useEffect(() => {
        const loadFlyonui = async () => {
            await import('flyonui/flyonui');
            window.HSStaticMethods.autoInit();
        };
        loadFlyonui().then();
    }, [location.pathname]);

    return (
        <>
            Hello!
        </>
    )
}

export default App

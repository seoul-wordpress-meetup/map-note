import clsx from 'clsx'
import {
    DetailedHTMLProps,
    ForwardedRef,
    forwardRef,
    HTMLAttributes,
    PropsWithChildren,
    useImperativeHandle,
    useLayoutEffect,
    useRef,
} from 'react'

type Props = PropsWithChildren<DetailedHTMLProps<HTMLAttributes<HTMLDivElement>, HTMLDivElement>>

const NaverMap = forwardRef((props: Props, ref: ForwardedRef<naver.maps.Map | null>) => {
    const {
        className,
        children,
        ...rest
    } = props

    const wrap = useRef<HTMLDivElement>(null),
        map = useRef<naver.maps.Map | null>(null)

    useLayoutEffect(() => {
        if (wrap.current) {
            map.current = new naver.maps.Map(wrap.current, {})
        }

        return () => {
            if (map.current) {
                map.current.destroy()
                map.current = null
            }
        }
    }, [wrap.current])

    useImperativeHandle<naver.maps.Map | null, naver.maps.Map | null>(ref, () => map.current)

    return (
        <div
            className={clsx('w-full h-full', className)}
            ref={wrap}
            {...rest}
        >
            {children}
        </div>
    )
})

export default NaverMap

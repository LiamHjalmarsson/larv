import styles from "./a_button.module.css";

const A_button = (props) => {
    return (
        <a href={props.href} className={`${styles.a_button} ${props.customClass}`}>
            {props.children}
        </a>
    )
}

export default A_button;
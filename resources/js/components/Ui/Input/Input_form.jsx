import style from "./Input_form.module.css";

const Input_form = (props) => {
    return (
        <div className={style.Inputform}>
            <label htmlFor={props.input.id}>
                {props.label}
            </label>
            <input {...props.input} className={`${style.Inputform__input} ${props.error ? style.Inputform__inputError  : ""} ${props.custom ? props.custom : ""}`} />
            {
                props.error && <p className={style.Inputform__p}> {props.error} </p>
            }
        </div>
    );
}

export default Input_form;
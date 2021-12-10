 interface StateInterface {

  constructor(props: any, default_value: any): void;

  set(value: any): void;

  get(): any;
}

export default StateInterface;

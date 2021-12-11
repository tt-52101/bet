import StateInterface from "/@src/generated/interfaces/StateInterface";

interface EventInterface {

  constructor(config: any, state: StateInterface): void;

  connect(): boolean;

  listen(): void;

  publish(value: any): void;
}


export default EventInterface

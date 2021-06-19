import { Endpoint } from '@interfaces/api/resource';

export abstract class ApiService {

  protected abstract basePath: string;

  protected abstract endpointMap: Map<string, Endpoint>;

  constructor() { }

  /**
   * Map a label to an endpoint
   *
   * @param label The label to map to an endpoint
   */
  endpoint(label: string): Endpoint {
    return this.endpointMap.get(label);
  }
}

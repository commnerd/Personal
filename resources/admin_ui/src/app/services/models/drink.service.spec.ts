import { TestBed } from '@angular/core/testing';

// Http testing module and mocking controller
import { HttpClientTestingModule, HttpTestingController } from '@angular/common/http/testing';
import { HttpClient } from '@angular/common/http';
import { TestDataPaginator } from '../../../testing/TestDataPaginator';

import { DrinkService } from './drink.service';
import { Drink } from '@interfaces/drink';

describe('QuoteService', () => {
  let service: DrinkService;
  let httpClient: HttpClient;
  let httpTestingController: HttpTestingController;
  const testDrinks: Array<Drink> = [
    {
      id: 1,
      name: 'Test Drink',
      recipe: 'Test Recipe',
    },
    {
      id: 2,
      name: 'Another Test Drink',
      recipe: 'Another Test Recipe',
    }
  ];

  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [ HttpClientTestingModule ]
    });

    service = TestBed.inject(DrinkService);
    // Inject the http service and test controller for each test
    httpClient = TestBed.inject(HttpClient);
    httpTestingController = TestBed.inject(HttpTestingController);
  });

  afterEach(() => {
    // After every test, assert that there are no more pending requests.
    httpTestingController.verify();
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });

  it('should list quotes', () => {
    const paginatedResponse = new TestDataPaginator(testDrinks).get(); 

    service.list().subscribe(data =>
      expect(data).toEqual(paginatedResponse)
    );

    const req = httpTestingController.expectOne('/api/drinks');
  
    expect(req.request.method).toEqual('GET');
  
    req.flush(paginatedResponse);
  });

  it('should get a drink', () => {
    const response = testDrinks[1];

    service.get(2).subscribe(data => expect(data).toEqual(testDrinks[1]));

    const req = httpTestingController.expectOne('/api/drinks/2');

    expect(req.request.method).toEqual('GET');

    req.flush(testDrinks[1]);
  });

  it('should create a drink on save', () => {
    const testDrinkPreSave: Drink = {
      name: 'A third drink',
      recipe: 'Recipe 3',
    };
    const testDrinkPostSave = {
      id: 3,
      name: 'A third drink',
      recipe: 'Recipe 3',
      created_at: 'now',
      edited_at: 'now',
    };

    service.save(testDrinkPreSave)
      .subscribe(data => expect(data).toEqual(testDrinkPostSave));

    const req = httpTestingController.expectOne('/api/drinks');

    expect(req.request.method).toEqual('POST');

    req.flush(testDrinkPostSave);
  });

  it('should update a quote on save', () => {
    const testDrink = {
      id: 3,
      name: 'A third drink',
      recipe: 'Recipe 3',
      created_at: 'now',
      edited_at: 'now',
    };
    
    httpClient.put<Drink>('/api/drinks/3', testDrink)
      .subscribe(data => expect(data).toEqual(testDrink));

    const req = httpTestingController.expectOne('/api/drinks/3');

    expect(req.request.method).toEqual('PUT');

    req.flush(testDrink);
  });

});
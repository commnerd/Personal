import { TestBed } from '@angular/core/testing';

// Http testing module and mocking controller
import { HttpClientTestingModule, HttpTestingController } from '@angular/common/http/testing';
import { HttpClient } from '@angular/common/http';
import { TestDataPaginator } from '../../../testing/TestDataPaginator';

import { QuoteService } from './quote.service';
import { Quote } from '@interfaces/quote';

describe('QuoteService', () => {
  let service: QuoteService;
  let httpClient: HttpClient;
  let httpTestingController: HttpTestingController;
  const testQuotes: Array<Quote> = [
    {
      id: 1,
      quote: 'Test Quote',
      source: 'Some Person',
      active: false,
    },
    {
      id: 2,
      quote: 'Another Test Quote',
      source: 'Other person',
      active: true,
    }
  ];

  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [ HttpClientTestingModule ]
    });

    service = TestBed.inject(QuoteService);
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
    const paginatedResponse = new TestDataPaginator(testQuotes).get(); 

    service.list().subscribe(data =>
      expect(data).toEqual(paginatedResponse)
    );

    const req = httpTestingController.expectOne('/api/quotes');
  
    expect(req.request.method).toEqual('GET');
  
    req.flush(paginatedResponse);
  });

  it('should get a quote', () => {
    const response = testQuotes[1];

    service.get(2).subscribe(data => expect(data).toEqual(testQuotes[1]));

    const req = httpTestingController.expectOne('/api/quotes/2');

    expect(req.request.method).toEqual('GET');

    req.flush(testQuotes[1]);
  });

  it('should create a quote on save', () => {
    const testQuotePreSave: Quote = {
      quote: 'A third quote',
      source: 'Person 3',
      active: true,
    };
    const testQuotePostSave = {
      id: 3,
      quote: 'A third quote',
      source: 'Person 3',
      active: true,
      created_at: 'now',
      edited_at: 'now',
    };

    service.save(testQuotePreSave)
      .subscribe(data => expect(data).toEqual(testQuotePostSave));

    const req = httpTestingController.expectOne('/api/quotes');

    expect(req.request.method).toEqual('POST');

    req.flush(testQuotePostSave);
  });

  it('should update a quote on save', () => {
    const testQuote = {
      id: 3,
      quote: 'A third quote',
      source: 'Person 3',
      active: true,
      created_at: 'now',
      edited_at: 'now',
    };
    
    httpClient.put<Quote>('/api/quotes/3', testQuote)
      .subscribe(data => expect(data).toEqual(testQuote));

    const req = httpTestingController.expectOne('/api/quotes/3');

    expect(req.request.method).toEqual('PUT');

    req.flush(testQuote);
  });

});